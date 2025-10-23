# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Common commands

- One-time project setup (installs PHP/Node deps, generates .env key, runs migrations, builds assets):
  ```bash
  composer run setup
  ```
- Start full dev environment (Laravel server, queue listener, Vite dev):
  ```bash
  composer run dev
  ```
- Laravel HTTP server only:
  ```bash
  php artisan serve
  ```
- Vite (frontend) dev/build:
  ```bash
  npm run dev
  npm run build
  ```
- Run tests (Pest via artisan):
  ```bash
  composer run test
  # or
  php artisan test
  ```
- Run a single test:
  ```bash
  # by file
  php artisan test tests/Feature/Auth/AuthenticationTest.php
  # by name/filter
  php artisan test --filter="users can logout"
  ```
- PHP code style (Laravel Pint):
  ```bash
  php vendor/bin/pint
  php vendor/bin/pint --test   # check only
  ```
- Database tasks:
  ```bash
  php artisan migrate
  php artisan db:seed
  php artisan queue:listen --tries=1
  ```

## Architecture and structure

- Framework and packages
  - Laravel 12 app with authentication via Laravel Fortify.
  - Livewire Volt + Livewire Flux for reactive UI: Volt page components live under Blade views and are routed via `Volt::route(...)`.
  - Asset pipeline uses Vite with `laravel-vite-plugin` and Tailwind CSS v4.

- HTTP and routing
  - Main routes are defined in `routes/web.php` (home, dashboard, settings) and `routes/auth.php` (login, register, password reset, email verification).
  - Volt pages are mapped with `Volt::route('path', 'namespace.component')` and protected with standard middleware (e.g., `auth`, `verified`).

- Views and UI
  - Blade layouts/components are under `resources/views/components/**` (e.g., `components/layouts/app.blade.php`).
  - Volt/Livewire pages are under `resources/views/livewire/**` and Flux UI pieces under `resources/views/flux/**`.
  - The base asset entries are `resources/css/app.css` and `resources/js/app.js` (see `vite.config.js`).

- Domain model
  - User and profile: `App\Models\User` has one `Profile`. `Profile` aggregates most portfolio entities.
  - Projects and skills: `Project` belongs to `Profile`, many-to-many with `Skill` via `project_skill` pivot.
  - Additional entities on `Profile`: `Study`, `Training`, `Experience` (one-to-many).
  - Polymorphic associations: `Image` and `Link` are `morphMany` from both `Profile` and `Project`.
  - See `database/migrations/**` for schema; core models live in `app/Models/**`.

- Testing
  - Test runner is Pest via `php artisan test`; configuration is in `phpunit.xml` and uses in-memory SQLite for isolation.
  - Feature tests cover auth flows and settings; Livewire Volt components are exercised via `Livewire\Volt\Volt::test(...)`.

- Assets and tooling
  - Vite is configured in `vite.config.js` with Laravel plugin and Tailwind CSS. Dev server enables CORS.
  - Tailwind CSS v4 is integrated via `@tailwindcss/vite`.

## Notes for making changes

- Adding a new page with Volt: create the Blade/Volt file under `resources/views/livewire/...` and register a route in `routes/web.php` (or `routes/auth.php`) using `Volt::route()`.
- If you add new asset entry points, include them in `vite.config.js` `laravel({ input: [...] })`.
- When changing models/migrations, run `php artisan migrate` (and update related relationships in `app/Models/**`).
