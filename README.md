# PHP + MySQL + phpMyAdmin — Portainer "New stack" via GitHub

Deploy a production-ready baseline stack using **Portainer** + **GitHub repository**.

## What you get

- **PHP 8.2 + Apache** (custom Dockerfile) — DocumentRoot at `/var/www/html/public`
- **MySQL 8.0** with persistent volume and optional init SQL
- **phpMyAdmin 5.2**
- Clean structure and sensible defaults
- Ready to deploy from Portainer **Stacks → Add stack → Repository**

```
.
├── docker-compose.yml
├── .env.example
├── php/
│   ├── Dockerfile
│   └── php.ini
├── mysql/
│   └── init/
│       └── 01_init.sql
└── src/
    ├── public/
    │   ├── index.php
    │   ├── info.php
    │   └── health
    └── shared/
        └── db.php
```

## 1) Create a GitHub repo

1. Create a new **private** repo on GitHub.
2. Upload everything in this folder (or unzip the attached archive and push).  
3. Ensure `docker-compose.yml` is at the repo root.

## 2) Portainer — New Stack (Repository)

In Portainer (Admin):  
**Stacks → Add stack → Repository**

Fill in:
- **Name:** `php-mysql-stack`
- **Repository URL:** `https://github.com/<you>/<repo>.git`
- **Repository reference:** `main` (or your branch)
- **Compose path:** `docker-compose.yml`
- **Authentication:** add if the repo is private
- **Auto update:** optional (Webhook/Git poll)

**Variables** (these map to `${...}` in `docker-compose.yml`):
- `APP_PORT` (default `8080`)
- `PMA_PORT` (default `8081`)
- `DB_PORT` (default `3306`)
- `MYSQL_ROOT_PASSWORD` (**change this!**)
- `MYSQL_DATABASE` (e.g. `appdb`)
- `MYSQL_USER` (e.g. `appuser`)
- `MYSQL_PASSWORD` (**change this!**)

> You can also commit a `.env` file to the repo, but Portainer **Variables** will override it.

Click **Deploy the stack**.

## 3) Verify

- App (PHP): `http://<node-ip>:8080`
- phpMyAdmin: `http://<node-ip>:8081`  
  Host: `db`, User/Pass = your variables

Visit `/info.php` and `/health` to verify PHP and healthcheck.

## 4) Local dev (optional)

If you test locally with Docker Compose:

```bash
cp .env.example .env
docker compose up -d --build
```

Then open:
- http://localhost:8080
- http://localhost:8081

## Notes

- Data persistence lives in the named volume `db_data` (MySQL).
- Initial SQL: place `.sql` files in `mysql/init/`.
- `a2enmod rewrite` is enabled; put your routes in `public/` (or adjust DocumentRoot).

## Troubleshooting

- **Mounts denied (macOS)**: Ensure the path is shared in **Docker Desktop → Settings → Resources → File Sharing**.
- **Can't connect to MySQL**: Check env vars; wait for DB to initialize; ensure `MYSQL_*` match across services.
- **phpMyAdmin login fails**: Use `db` as host; confirm the `MYSQL_USER` exists and the password matches.

Enjoy! 🚀
