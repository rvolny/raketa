# Raketa

Backend for gagarin.

Uses PSR2 code style.

## Requirements
- Apache httpd 2.4 / nginx
- MySQL 5.7 / MariaDB
- PHP 7.2
- Composer 1.6

## Database
```
  create schema raketa
  create user raketa identified by '**********'
  grant all on raketa.* to raketa
```

## Installation
```
git clone git@github.com:rvolny/raketa.git
cp .env.example .env
```
Edit content of `.env` to your needs (especially APP_URL, DB_PASSWORD and L5_SWAGGER_CONST_HOST)  
```
composer install  
php artisan key:generate
php artisan migrate
php artisan db:seed  
php artisan passport:client --personal  
ln -s ../storage/app/public public/storage  
```

## Updating
```
./tst-update
```
If you wish to refresh database, run
```
php artisan migrate:refresh --seed
```

## Testing API
Use Swagger at http://raketa.local/api/documentation  

When authorization is required, use implicit OAuth2 grant with `client_id=1` and then use credentials from [UserSeeder.php](database/seeds/UserSeeder.php). Should you need to log out from the application, go to http://raketa.local/home and log out. 

## Laravel 5 IDE Helper Generator
Generated helpers are pushed to Git, so no need to do it manually.
```
php artisan clear-compiled
php artisan ide-helper:generate
php artisan ide-helper:meta
php artisan ide-helper:models
```

## References
Swagger data types - https://swagger.io/docs/specification/data-models/data-types/  
php-swagger examples - https://github.com/zircote/swagger-php/tree/master/Examples/petstore-3.0  
HTTP status codes - https://en.wikipedia.org/wiki/List_of_HTTP_status_codes  
Restful API - https://restfulapi.net/http-methods/  
Faker - https://github.com/fzaninotto/Faker  
