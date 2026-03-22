# AGENT.md

## Overview

This repository implements a simple **guestbook application** using **Laravel**, **Livewire**, and **Filament** for admin UI. The project leverages Blade templates for the frontend, and PHP for backend logic.

- **Frontend:** Blade, Livewire
- **Admin Panel:** Filament
- **Database:** SQLite (by default, via Laravel)
- **Languages:** Blade (60.6%), PHP (38.4%), Other (1%)
- **Project Root:** [silent-8ch/livewire-guestbook](https://github.com/silent-8ch/livewire-guestbook)

---

## Architecture & Directory Structure

| Path                          | Purpose                              |
|-------------------------------|--------------------------------------|
| `app/Models/`                 | Eloquent models (e.g. GuestbookEntry)|
| `app/Http/Livewire/`          | Livewire components                  |
| `database/migrations/`        | DB schema migrations                 |
| `resources/views/`            | Blade templates & Livewire views     |
| `routes/web.php`              | Web routes (user-facing and admin)   |
| `app/Filament/Resources/`     | Filament resource definitions        |

---

## Main Features

- Visitors can submit guestbook entries via a Livewire-powered form.
- Entries are displayed on the homepage or a guestbook page.
- Admins manage entries (CRUD) through the Filament admin panel at `/admin`.

---

## Models

**GuestbookEntry**
- Represents a single guestbook message.
- Typical fields: `id`, `name`, `email`, `message`, `created_at`, `updated_at`.

```
app/Models/GuestbookEntry.php
```

---

## Livewire Components

- `GuestbookForm`: Handles user entry submission.
- `GuestbookList`: Displays a list of messages.

Files:
- `app/Http/Livewire/GuestbookForm.php`
- `app/Http/Livewire/GuestbookList.php`
- Blade views in `resources/views/livewire/`

---

## Filament Admin

Filament is installed to provide an admin interface.

- Access: `/admin`
- Authentication: via user table, create via `php artisan make:filament-user`
- Resource: `GuestbookEntryResource.php` gives CRUD UI for entries.

---

## Routes

- `/` or `/guestbook`: Public guestbook page, shows form & entries.
- `/admin`: Filament admin panel (CRUD for `GuestbookEntry`).

Defined in:
```
routes/web.php
```

---

## Setup

1. **Clone the repo**
2. **Install dependencies:**
    ```
    composer install
    npm install
    ```
3. **Copy and edit environment:**
    ```
    cp .env.example .env
    # set APP_ENV=local and database details as needed
    ```
4. **Set application key:**
    ```
    php artisan key:generate
    ```
5. **Migrate the database:**
    ```
    php artisan migrate
    ```
6. **(Optional) Create admin user:**
    ```
    php artisan make:filament-user
    ```
7. **Run dev server:**
    ```
    php artisan serve
    ```

---

## Conventions

- **Environment**: `.env` is ignored by git (never committed).
- **Database**: Uses SQLite by default; can be changed in `.env`.
- **Code Structure**: Follows Laravel and Livewire conventions.

---

## Further Steps / TODOs

- Add spam filtering to guestbook submissions.
- Add moderation controls to admin panel (approve, reject).
- Add tests in `tests/Feature/` and `tests/Unit/`.

---

## References

- [Laravel Documentation](https://laravel.com/docs)
- [Livewire Documentation](https://livewire.laravel.com/docs)
- [Filament Admin Documentation](https://filamentphp.com/docs/3.x/admin/installation)

---

_Last updated: 2026-03-22_