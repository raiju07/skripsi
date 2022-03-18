# LARAVEL 6 Skripsi Karyawan Manajemen

---

[Laravel PHP Framework 6.18.35](http://laravel.com).


## Prerequisites

1. PHP > 7.3
1. MySQL or PostgreSql
1. [Composer](http://getcomposer.org)


## Getting Started

1. Clone repo dengan perintah dibawah ini, di folder yg anda inginkan :
    
	```
	git clone https://github.com/raiju07/skripsi.git
	```

1. Masuk ke dalam folder tersebut : 
   ```
   cd skripsi
   ```
2. Install composer dependencies.

	```
	composer install
	```
	
3. Buat file konfigurasi `.env` (copy dari `.env.example`) dan setup database sesuai dengan nama database dalam Mysql

	```
	##MySQL
	DB_CONNECTION=mysql
	DB_HOST=localhost
	DB_PORT=3306
	DB_DATABASE=nama_database
	DB_USERNAME=root
	DB_PASSWORD=
	```
    
1. Database Migrasi.

	```
	php artisan migrate
	```
2. Seed user database.

	```
	php artisan db:seed
	```
1. Jalankan server demgan port standar

	```
	php artisan serve
	```
    