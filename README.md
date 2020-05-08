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

## Official Documentation

Documentation for the User preferences Micro service in Lumen can be found on the [LumenUserPreferencesDemo](https://github.com/Dipenduroy/LumenUserPreferencesDemo).

## Configure User preferences Micro service URL

Set correct url for service in ApigatewayController.php, replace http://local.userpreferences/
