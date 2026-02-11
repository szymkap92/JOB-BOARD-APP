# Job Board Application

Prosta aplikacja do zarządzania ofertami pracy, stworzona jako zadanie rekrutacyjne.

## Technologie

- **Laravel 12** z PHP 8.2
- **FilamentPHP v3** (Panel administracyjny)
- **Tailwind CSS v4** (Frontend, budowany przez Vite)
- **MySQL/MariaDB** (Baza danych)
- **SQLite** (Testy)

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

Skonfiguruj bazę danych w pliku `.env`, a następnie:

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
