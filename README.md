# DNB-Z

Local setup uses environment variables loaded from a root-level `.env` file (git-ignored). Defaults are already provided for the local Docker stack plus legacy credentials preserved from the original code.

Quick start:
1. Ensure `.env` exists at repo root (already provided locally). Adjust values if needed.
2. Run the stack: `docker-compose up --build`
   - Frontend: http://localhost:8081
   - Backend: http://localhost:8080
3. For manual runs, load vars first:  
   - Backend: `cd backend/DNB-Z-backend && set -a; source ../.env; set +a; ./mvnw spring-boot:run`  
   - Frontend: `cd frontend && set -a; source ../.env; set +a; php -S 0.0.0.0:8081`

See `backend/DNB-Z-backend/README.md` and `frontend/README.md` for details.

## Azure Functions deployment (containerized)
The `infrastructure/` folder contains Terraform to provision Azure resources for running the backend and frontend as container-based Function Apps.

Prereqs:
- Azure CLI logged in (`az login`)
- Terraform >= 1.6
- Docker for building/pushing images

Steps:
1. Configure values: copy `infrastructure/terraform.tfvars.example` to `infrastructure/terraform.tfvars` and edit as needed (region, DB settings, image tags).
2. Provision Azure resources:
   ```bash
   cd infrastructure
   terraform init
   terraform apply
   ```
   Note the `container_registry` output (ACR login server).
3. Build and push images to ACR (replace `ACR_NAME` with the ACR name from Terraform output; image names/tags must match your tfvars):
   ```bash
   az acr login --name ACR_NAME
   docker build -t ACR_NAME.azurecr.io/dnb-z-backend:latest ../backend/DNB-Z-backend
   docker build -t ACR_NAME.azurecr.io/dnb-z-frontend:latest ../frontend
   docker push ACR_NAME.azurecr.io/dnb-z-backend:latest
   docker push ACR_NAME.azurecr.io/dnb-z-frontend:latest
   ```
4. Update `backend_image_name/frontend_image_name` (and tags) in `terraform.tfvars` if you used different names, then re-run `terraform apply` or restart the Function Apps in Azure so they pull the new images.
5. Set the correct `backend_url` and DB settings in `terraform.tfvars` to point at your database and backend endpoint.

Outputs will include Function App names and ACR login server. The Terraform stack does not create a database; point the env vars at an existing MySQL instance.
