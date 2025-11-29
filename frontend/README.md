# DNB-Z Frontend

PHP/Apache web UI for the DNB-Z project. Talks to the backend API and a MySQL database for data access.

## Stack
- PHP 8.2 (mysqli extension)
- Apache (via `php:8.2-apache` base image)
- MySQL 5.7

## Prerequisites (local run without Docker)
- PHP 8.2 with `mysqli` enabled
- Web server (Apache/Nginx) or PHP built-in server
- MySQL instance reachable with credentials you control

## Configuration
Environment variables:
- `BACKEND_URL` (default `http://localhost:8080`) – base URL for API calls
- `DB_HOST` (default `localhost`)
- `DB_USER` (default `dnb_user`)
- `DB_PASSWORD` (default `dnb_pass`)
- `DB_NAME` (default `dnb_z`)

### .env setup (root of repo)
1. Create or edit the root `.env` file (git-ignored). It already contains local defaults and legacy credentials preserved from the original code; adjust as needed.
2. For a local PHP run, load the variables first:  
   ```bash
   cd frontend
   set -a; source ../.env; set +a
   php -S 0.0.0.0:8081
   ```
3. Docker Compose uses the same `.env` automatically.
- Note: the `.env` default `DB_HOST` is `mysql` to match the compose service name; change it to `localhost` if you are talking to a local MySQL instance directly.

## Run locally (simple)
```bash
cd frontend
export BACKEND_URL=http://localhost:8080
export DB_HOST=localhost DB_NAME=dnb_z DB_USER=dnb_user DB_PASSWORD=dnb_pass
php -S 0.0.0.0:8081
# Open http://localhost:8081
```

## Docker
Build and run the container:
```bash
docker build -t dnb-z-frontend ./frontend
docker run --rm -p 8081:80 \
  -e BACKEND_URL=http://localhost:8080 \
  -e DB_HOST=mysql -e DB_NAME=dnb_z -e DB_USER=dnb_user -e DB_PASSWORD=dnb_pass \
  dnb-z-frontend
```

## Docker Compose (recommended with backend)
From the repo root:
```bash
docker-compose up --build
```
- Frontend: `http://localhost:8081`
- Backend: `http://localhost:8080`
- MySQL seeded from backend SQL script.

## Project layout
- `index.php` and related pages – UI entry points
- `class/` – PHP utility classes (DB, validation, API client)
- `assets/` – static assets (CSS/JS/fonts)
- `Dockerfile` – builds the frontend container

## Notes
- The frontend relies on the backend API being reachable; ensure `BACKEND_URL` points to it.
- Database settings are read at runtime; update env vars instead of hardcoding credentials.
