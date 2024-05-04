Initial Setup
1. Clone the repository

git clone https://github.com/01Kirito/Assignment.git

2. cd into the project

cd Assignment

3. Install composer dependencies

composer install

4. Install NPM dependencies    *not required cause we use api by postman*

npm install

5. Copy the .env file        * Manage .env file by changing the database name and database connection*

cp .env.example .env 

6. Generate an app encryption key

php artisan key:generate

7. Migrate the database 

php artisan migrate

8. Use Seeder to seed the database   

php artisan db:seed --class=Founder    
php artisan db:seed --class=DatabaseSeeder

 Email    :Bill_gate@gmail.com
 Password :Bill1234

