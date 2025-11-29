output "resource_group" {
  description = "Resource group name."
  value       = azurerm_resource_group.rg.name
}

output "container_registry" {
  description = "ACR login server."
  value       = azurerm_container_registry.acr.login_server
}

output "backend_function_app" {
  description = "Backend Function App name."
  value       = azurerm_linux_function_app.backend.name
}

output "frontend_function_app" {
  description = "Frontend Function App name."
  value       = azurerm_linux_function_app.frontend.name
}
