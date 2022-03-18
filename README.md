# LARAVEL 8 Currency with Passport Oauth2

---

[Laravel PHP Framework 6.18.35](http://laravel.com).



## Prerequisites

1. PHP > 7.3
1. MySQL or PostgreSql
1. [Composer](http://getcomposer.org)


## Getting Started

1. Clone to your base project directory.
    
	```
	git clone https://github.com/raiju07/skripsi.git
	```
	
2. Install composer dependencies.

	```
	composer install
	```
	
3. Create configuration file `.env` (copy from `.env.example`) and setup the database from Mysql

	```
	##MySQL
	DB_CONNECTION=mysql
	DB_HOST=localhost
	DB_PORT=3306
	DB_DATABASE=database
	DB_USERNAME=root
	DB_PASSWORD=
	```
    
1. Migrate the database.

	```
	php artisan migrate
	```
1. Seed the user database.

	```
	php artisan db:seed
	```
1. Run the server

	```
	php artisan serve
	```
    