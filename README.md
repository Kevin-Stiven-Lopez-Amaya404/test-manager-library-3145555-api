# API · Manager Library

Backend Laravel/PHP con arquitectura dirigida por el contrato de `docs`. Las migraciones versionadas viven aquí; `infra` solo crea PostgreSQL vacío. Esta decisión sigue ADR-001 de la documentación y difiere de la solicitud operativa de usar Liquibase en `tool`: el reto documentado fija Laravel y la propiedad del esquema en el backend.

```bash
cp .env.example .env
composer install
php artisan migrate
php artisan serve
```
