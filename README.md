## IBAN Validator API

### About

Technical assessment for Ascentic (Backend)

### Author

Isuru Ranawaka

### Installation

1. Clone the git repository

   ```git clone https://github.com/isu3ru/tech-assessment-backend-ascentic.git```


2. Create .env file

   Copy and paste .env.example and rename to .env

   or -

   `cp .env.example .env`


2. Install dependencies

   ```composer install```


3. Set encryption key

   ```php artisan key:generate```


4. Set database connection

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<YOUR_DATABASE_NAME>
    DB_USERNAME=<YOUR_DATABASE_USERNAME>
    DB_PASSWORD=<YOUR_DATABASE_PASSWORD>
   ```

   Create database using `php artisan migrate --seed`. This will create the database and seed the initial admin user account.

5. Run

    `php artisan serve`
