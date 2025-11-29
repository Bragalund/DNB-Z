# DNB-Z Backend

Spring Boot (1.4.2) REST API for the DNB-Z project. Provides account, customer, and transfer endpoints backed by MySQL and ORMLite.

## Stack
- Java 8
- Spring Boot 1.4.2
- Maven
- MySQL 5.7 (tested via Docker)

## Prerequisites (local build)
- Java 8 JDK
- Maven 3.x (or use the bundled `./mvnw`)
- MySQL instance reachable with a schema you control

## Configuration
Environment variables (used at runtime):
- `DB_HOST` (default `localhost`)
- `DB_PORT` (default `3306`)
- `DB_NAME` (default `dnb_z`)
- `DB_USER` (default `dnb_user`)
- `DB_PASSWORD` (default `dnb_pass`)
- `JAVA_OPTS` (optional JVM flags)

### .env setup (root of repo)
1. Create or edit `.env` in the repo root (already git-ignored). The file currently holds safe local defaults plus legacy credentials preserved from the original code; adjust as needed.
2. For local (non-Docker) runs, export the variables before starting:  
   ```bash
   cd backend/DNB-Z-backend
   set -a; source ../.env; set +a
   ```
3. Docker Compose automatically picks up `.env` when you run `docker-compose up`.
- Note: the default `DB_HOST` in `.env` points to the compose MySQL service (`mysql`). Change it to `localhost` if you are connecting to a local MySQL instance directly.

## Run locally
```bash
cd backend/DNB-Z-backend
export DB_HOST=localhost DB_NAME=dnb_z DB_USER=dnb_user DB_PASSWORD=dnb_pass
./mvnw spring-boot:run
# API available on http://localhost:8080
```

## Build a runnable jar
```bash
cd backend/DNB-Z-backend
./mvnw clean package -DskipTests
java -jar target/*-SNAPSHOT.jar
```

## Docker
Build and run the standalone container:
```bash
docker build -t dnb-z-backend ./backend/DNB-Z-backend
docker run --rm -p 8080:8080 \
  -e DB_HOST=mysql -e DB_NAME=dnb_z -e DB_USER=dnb_user -e DB_PASSWORD=dnb_pass \
  dnb-z-backend
```

## Docker Compose (recommended for full stack)
From the repo root:
```bash
docker-compose up --build
```
- Backend: `http://localhost:8080`
- MySQL: `localhost:3306` (default creds in `docker-compose.yml`)
- Database seed: `Testdata_til_Database/DBcreationScript.sql` auto-imported on first run.

## Project layout
- `src/main/java/...` – Spring Boot application and controllers/services
- `Testdata_til_Database/DBcreationScript.sql` – schema and seed data
- `Dockerfile` – builds the backend container

## Testing
```bash
cd backend/DNB-Z-backend
./mvnw test
```
