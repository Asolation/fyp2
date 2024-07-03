## Installation

Ensure you have Composer and Laragon installed on your computer. This system was developed and tested on a Windows 10 platform. Ensure also you have PHP 8.3.6 or above from [here](https://windows.php.net/download#php-8.3)(make sure you choose the thread safe version and zip file).
![image](https://github.com/Asolation/fyp2/assets/61383335/4e3638c8-4340-4998-bc3f-56a34489b44c)

![image](https://github.com/Asolation/fyp2/assets/61383335/96002c62-a5c6-4a3a-b0c8-7229d022b772)


### Setting up Laragon with PHP 8.3.6 or Above

1. Download Laragon(the full version) from the [official website](https://laragon.org/download/index.html) and install it.
2. After installation, open Laragon and right click anywhere on the laragon app and go to **Menu > Tools > Quick Add > PHP** and select PHP 8.3.6 or above when you have put the unzip php file in the directory.
3. Restart Laragon to apply the changes.

These instructions assume that you are familiar with running a Laravel project.

### Running the Laravel Project

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
5. You can now log in with the user "admin@example.com" and password "123" at [http://localhost:8000/login](http://localhost:8000/login).

