## Installation

Ensure you have Composer and laragon installed on your computer. This system was developed and tested on a Windows 10 platform.
Ensure also you have php8.3.6 or above from https://windows.php.net/download#php-8.3

These instructions assume that you are familiar with running a Laravel project.

1. Copy `.env.example` to `.env`. The `.env.example` file is automatically created by Composer when initializing a Laravel project.
2. Set the `DB_` environment variables in the `.env` file to match your database settings.
3. Create a database with the name you specified for `DB_DATABASE` in your `.env` file. Then, execute the following commands in your terminal:
   - `composer install` to install PHP dependencies.
   - `npm install` to install Node.js dependencies.
   - `php artisan key:generate` to generate a new application key.
   - Migrate and seed the database with `php artisan migrate:fresh --seed`.
4. Run the application by executing:
   - `php artisan serve` to start the Laravel development server.
   - In a new terminal window or tab, run `npm run dev` to compile your frontend assets.
5. You can now log in with the user "admin@example.com" and password "123" at http://localhost:8000/login.
