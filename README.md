![hompage](https://user-images.githubusercontent.com/98668706/183855814-e2006ecf-d700-4885-8d90-280115bbe37d.png)

Homepage preview video:

https://www.youtube.com/watch?v=3nAU5TuAggE&t=1s

AdminPanel preview video:

https://www.youtube.com/watch?v=9vlQwsTh-OM

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

