# Job Board Application

Prosta aplikacja do zarządzania ofertami pracy, stworzona jako zadanie rekrutacyjne.

## Technologie

- **Laravel 12** z PHP 8.2
- **FilamentPHP v3** (Panel administracyjny)
- **Tailwind CSS v4** (Frontend, budowany przez Vite)
- **SQLite** (domyślna baza danych, konfigurowalna na MySQL/MariaDB w `.env`)

## Funkcjonalności

- **Panel Admina** (`/admin`): Zarządzanie kategoriami i ofertami pracy (CRUD).
- **Strona kliencka** (`/`): Publiczna lista ofert z paginacją.
- **Wyszukiwarka**: Szukanie po tytule i opisie.
- **Filtrowanie**: Po kategorii i lokalizacji.
- **Testy**: 7 testów funkcjonalnych (filtry, wyszukiwarka, strona szczegółów).

## Instalacja

```bash
git clone https://github.com/szymkap92/JOB-BOARD-APP.git
cd JOB-BOARD-APP
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

Domyślna konfiguracja (`.env.example`) używa **SQLite** - nie wymaga dodatkowej konfiguracji bazy danych.

Jeśli chcesz użyć MySQL/MariaDB, zmień w pliku `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=job_board
DB_USERNAME=root
DB_PASSWORD=
```

Następnie uruchom migracje z seederem i serwer:

```bash
php artisan migrate --seed
php artisan serve
```

Komenda `migrate --seed` utworzy tabele i wypełni bazę przykładowymi danymi (kategorie, oferty pracy, konto admina).

## Dane do logowania do panelu admina

- **URL:** http://localhost:8000/admin
- **Email:** admin@test.pl
- **Haslo:** ge2gy6ok

## Testy

```bash
php artisan test
```
