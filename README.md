# LumenApiGateway

## Composer

composer install

## Copy .env

cp .env.example .env

## Configure .env

Set mysql db connection and service basic auth credentials

## Migrate db

php artisan migrate

## Run LumenApiGateway

php -S localhost:8000 -t public

## Import Postman collection

Configure host and port in the endpoints
