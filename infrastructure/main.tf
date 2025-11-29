terraform {
  required_version = ">= 1.6.0"
  required_providers {
    azurerm = {
      source  = "hashicorp/azurerm"
      version = "~> 3.111"
    }
    random = {
      source  = "hashicorp/random"
      version = "~> 3.6"
    }
  }
}

provider "azurerm" {
  features {}
}

locals {
  prefix = lower(replace(var.project_name, "/[^a-zA-Z0-9]/", ""))
  tags   = merge({ project = var.project_name }, var.tags)
}

resource "random_string" "suffix" {
  length  = 5
  upper   = false
  lower   = true
  special = false
}

resource "azurerm_resource_group" "rg" {
  name     = "${local.prefix}-rg"
  location = var.location
  tags     = local.tags
}

resource "azurerm_storage_account" "sa" {
  name                     = substr("${local.prefix}${random_string.suffix.result}sa", 0, 24)
  resource_group_name      = azurerm_resource_group.rg.name
  location                 = azurerm_resource_group.rg.location
  account_tier             = "Standard"
  account_replication_type = "LRS"
  tags                     = local.tags
}

resource "azurerm_service_plan" "plan" {
  name                = "${local.prefix}-plan"
  location            = azurerm_resource_group.rg.location
  resource_group_name = azurerm_resource_group.rg.name
  os_type             = "Linux"
  sku_name            = var.plan_sku
  tags                = local.tags
}

resource "azurerm_container_registry" "acr" {
  name                = "${local.prefix}${random_string.suffix.result}"
  resource_group_name = azurerm_resource_group.rg.name
  location            = azurerm_resource_group.rg.location
  sku                 = "Basic"
  admin_enabled       = true
  tags                = local.tags
}

resource "azurerm_linux_function_app" "backend" {
  name                       = "${local.prefix}-backend-func"
  resource_group_name        = azurerm_resource_group.rg.name
  location                   = azurerm_resource_group.rg.location
  service_plan_id            = azurerm_service_plan.plan.id
  storage_account_name       = azurerm_storage_account.sa.name
  storage_account_access_key = azurerm_storage_account.sa.primary_access_key
  functions_extension_version = "~4"
  https_only                  = true

  app_settings = {
    DOCKER_REGISTRY_SERVER_URL      = "https://${azurerm_container_registry.acr.login_server}"
    DOCKER_REGISTRY_SERVER_USERNAME = azurerm_container_registry.acr.admin_username
    DOCKER_REGISTRY_SERVER_PASSWORD = azurerm_container_registry.acr.admin_password
    DB_HOST                         = var.db_host
    DB_PORT                         = var.db_port
    DB_NAME                         = var.db_name
    DB_USER                         = var.db_user
    DB_PASSWORD                     = var.db_password
    JAVA_OPTS                       = var.java_opts
  }

  site_config {
    always_on = true
    application_stack {
      docker {
        registry_url = "https://${azurerm_container_registry.acr.login_server}"
        image_name   = var.backend_image_name
        image_tag    = var.backend_image_tag
      }
    }
  }

  tags = local.tags
}

resource "azurerm_linux_function_app" "frontend" {
  name                       = "${local.prefix}-frontend-func"
  resource_group_name        = azurerm_resource_group.rg.name
  location                   = azurerm_resource_group.rg.location
  service_plan_id            = azurerm_service_plan.plan.id
  storage_account_name       = azurerm_storage_account.sa.name
  storage_account_access_key = azurerm_storage_account.sa.primary_access_key
  functions_extension_version = "~4"
  https_only                  = true

  app_settings = {
    DOCKER_REGISTRY_SERVER_URL      = "https://${azurerm_container_registry.acr.login_server}"
    DOCKER_REGISTRY_SERVER_USERNAME = azurerm_container_registry.acr.admin_username
    DOCKER_REGISTRY_SERVER_PASSWORD = azurerm_container_registry.acr.admin_password
    BACKEND_URL                     = var.backend_url
    DB_HOST                         = var.db_host
    DB_PORT                         = var.db_port
    DB_NAME                         = var.db_name
    DB_USER                         = var.db_user
    DB_PASSWORD                     = var.db_password
  }

  site_config {
    always_on = true
    application_stack {
      docker {
        registry_url = "https://${azurerm_container_registry.acr.login_server}"
        image_name   = var.frontend_image_name
        image_tag    = var.frontend_image_tag
      }
    }
  }

  tags = local.tags
}
