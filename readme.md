# Coding Test

## Prerequisites

* PHP 7.3
* Composer
* MySql 5.7

## Installation and Running

### Composer
```
composer install
```
### Create database as laravel (or anything as you like)
```
configure the below fields in .env file

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Artisan
```
php artisan migrate

php artisan db:seed --class=UsersTableSeeder

php artisan serve
```

### In the browser

```
http://127.0.0.1:8000
```