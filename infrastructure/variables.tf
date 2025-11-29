variable "project_name" {
  description = "Short name for the deployment; used as a prefix."
  type        = string
  default     = "dnb-z"
}

variable "location" {
  description = "Azure region for all resources."
  type        = string
  default     = "westeurope"
}

variable "plan_sku" {
  description = "App Service plan SKU for container-based Function Apps (Elastic Premium required)."
  type        = string
  default     = "EP1"
}

variable "backend_image_name" {
  description = "Container repository/name for the backend image inside ACR."
  type        = string
  default     = "dnb-z-backend"
}

variable "backend_image_tag" {
  description = "Tag for the backend image."
  type        = string
  default     = "latest"
}

variable "frontend_image_name" {
  description = "Container repository/name for the frontend image inside ACR."
  type        = string
  default     = "dnb-z-frontend"
}

variable "frontend_image_tag" {
  description = "Tag for the frontend image."
  type        = string
  default     = "latest"
}

variable "backend_url" {
  description = "Base URL the frontend should use to reach the backend."
  type        = string
  default     = "http://localhost:8080"
}

variable "db_host" {
  description = "Database host."
  type        = string
  default     = "mysql"
}

variable "db_port" {
  description = "Database port."
  type        = string
  default     = "3306"
}

variable "db_name" {
  description = "Database name."
  type        = string
  default     = "dnb_z"
}

variable "db_user" {
  description = "Database user."
  type        = string
  default     = "dnb_user"
}

variable "db_password" {
  description = "Database password."
  type        = string
  default     = "dnb_pass"
  sensitive   = true
}

variable "java_opts" {
  description = "Optional JVM flags for the backend container."
  type        = string
  default     = ""
}

variable "tags" {
  description = "Additional resource tags."
  type        = map(string)
  default     = {}
}
