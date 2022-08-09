1-Setup (install/create) Database and PHP server.

2-Install Composer

3-Install npm.

4-Install git. Get this project from Github (git clone).

5-Copy ".env.example" file and rename to ".env". Edit the .env file (connect to DB).

6-Run "composer update".

7-Run "npm install", then "npm run dev".

8-Run "php artisan key:generate". It will add application key to the .env file.

9-Run "php artisan migrate" Laravel Migrations.

10-It's the correct way to seeding: "php artisan db:seed --class=DatabaseSeeder" Laravel Seeding.

