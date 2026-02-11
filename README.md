# Job Board Application

Prosta aplikacja do zarządzania ofertami pracy, stworzona jako zadanie rekrutacyjne.

## Technologie

- **Laravel 11**
- **FilamentPHP v3** (Panel administracyjny)
- **Tailwind CSS** (Frontend)
- **SQLite** (Baza danych do testów)
- **MariaDB/MySQL** (Baza produkcyjna)

## Funkcjonalności

- **Panel Admina**: Zarządzanie kategoriami i ofertami pracy (CRUD).
- **Strona Główna**: Publiczna lista ofert z filtrowaniem.
- **Wyszukiwarka**: Szukanie po tytule, opisie, lokalizacji i kategorii.
- **Testy**: Zautomatyzowane testy funkcjonalne strony głównej i filtrów.

## Instalacja

1. Sklonuj repozytorium.
2. Uruchom `composer install`.
3. Skopiuj `.env.example` do `.env` i skonfiguruj bazę danych.
4. Uruchom migracje: `php artisan migrate`.
5. Stwórz użytkownika admina: `php artisan make:filament-user`.
6. Uruchom serwer: `php artisan serve`.

## Testy

Uruchomienie testów automatycznych:

```bash
php artisan test
```

## Dane do logowania do panelu admina:

URL: /admin

Login: admin@test.pl

Hasło: ge2gy6ok
