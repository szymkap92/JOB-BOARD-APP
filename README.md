# Job Board Application

Prosta aplikacja do zarządzania ofertami pracy, stworzona jako zadanie rekrutacyjne.

## Technologie

- **Laravel 12** z PHP 8.2
- **FilamentPHP v3** (Panel administracyjny)
- **Tailwind CSS v4** (Frontend, budowany przez Vite)
- **MySQL / MariaDB** (domyślna konfiguracja w `.env.example`)
- **SQLite** (opcjonalnie, do szybkiego uruchomienia lokalnie)

## Funkcjonalności

- **Panel Admina** (`/admin`): Zarządzanie kategoriami i ofertami pracy (CRUD).
- **Strona kliencka** (`/`): Publiczna lista ofert z paginacją.
- **Wyszukiwarka**: Szukanie po tytule i opisie.
- **Filtrowanie**: Po kategorii i lokalizacji.
- **Bezpieczeństwo widoku**: Opisy ofert są sanitizowane przed wyświetleniem.
- **Testy**: testy funkcjonalne dla listy ofert, filtrów, wyszukiwarki i widoku szczegółów.

## Instalacja

```bash
git clone https://github.com/szymkap92/JOB-BOARD-APP.git
cd JOB-BOARD-APP
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

Ustaw dane bazy oraz konto administratora w `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=job_board
DB_USERNAME=root
DB_PASSWORD=
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=TwojeSilneHaslo
```

Jeśli chcesz użyć SQLite:

```env
DB_CONNECTION=sqlite
# DB_DATABASE=database/database.sqlite
```

Następnie uruchom migracje z seederem i serwer:

```bash
php artisan migrate --seed
php artisan serve
```

Komenda `migrate --seed` utworzy tabele i wypełni bazę przykładowymi danymi (kategorie, oferty pracy, konto admina).

## Dane do logowania do panelu admina

- **URL:** http://localhost:8000/admin
- **Email:** wartość z `ADMIN_EMAIL` w `.env`
- **Hasło:** wartość z `ADMIN_PASSWORD` w `.env`

## Testy

```bash
php artisan test
```
