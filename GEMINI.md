# Project: IKM KBRI Damaskus

This is a web application for IKM (Industri Kecil Menengah - Small and Medium Industries) under the Indonesian Embassy in Damascus.

## Technologies

*   **Backend:** PHP 8.2, Laravel 12
*   **Frontend:** Livewire 3, Tailwind CSS, Vite
*   **Authentication:** Laravel Jetstream
*   **Database:** SQLite (default, can be configured in `.env`)

## Building and Running

1.  **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

2.  **Set up environment:**
    Copy `.env.example` to `.env` if it doesn't exist.
    ```bash
    cp .env.example .env
    ```
    Then, generate an application key:
    ```bash
    php artisan key:generate
    ```

3.  **Run migrations:**
    ```bash
    php artisan migrate
    ```

4.  **Run the development servers:**
    The project is configured to run multiple services concurrently.
    ```bash
    npm run dev
    ```
    This will start:
    *   The PHP development server (`php artisan serve`)
    *   The queue listener (`php artisan queue:listen`)
    *   The log watcher (`php artisan pail`)
    *   The Vite development server (`npm run dev`)

## Development Conventions

*   The project uses **Laravel Jetstream** with the **Livewire** stack. This means that most of the frontend is built with Livewire components, which are PHP classes that render Blade templates.
*   Styling is done with **Tailwind CSS**.
*   The project includes a `dev` script in `composer.json` which is the recommended way to run the development environment.

## In-progress feature: Instansi Manager

The user is currently working on a feature to manage "Instansi" (Institutions).

*   **Migration:** `database/migrations/2025_11_23_071720_create_instansis_table.php`
*   **Livewire Component:** `app/Livewire/InstansiManager.php`
*   **View:** `resources/views/livewire/instansi-manager.blade.php`

This feature is incomplete. The Livewire component is missing the CRUD logic and the view is empty.
