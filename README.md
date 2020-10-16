# REST API and AJAX

This repository contains a Laravel application that provides
1. a REST API for storing and retrieving articles
2. a HTML/CSS/JS/jQuery home page for accessing the articles using AJAX requests

To clone this repository and get the application running, do the following steps
1. Clone your project using `git clone https://github.com/IADT-CC-Y4-AdvJS/REST-API-and-AJAX.git`
2. Go to the folder application using `cd` command on your command or terminal window
3. Run `composer install` on your cmd or terminal
4. Copy .env.example file to .env on the root folder. You can type:
   * `copy .env.example .env` if using the Windows command window or
   * `cp .env.example .env` if using the GitBash/MacOS terminal window
5. Using PHPMyAdmin (or otherwise) create a database for the project (and a user account if you don't want to use the root account)
6. Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
   * By default for XAMPP, the root account has a username 'root' and no password.
   * By default for LAMP, the root account has a username 'root' and password 'root'.
7. Run `php artisan key:generate`
8. Run `php artisan migrate`
9. Run `php artisan db:seed`
10. Run `php artisan serve`
11. Go to localhost:8000
