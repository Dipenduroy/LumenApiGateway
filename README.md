# LumenApiGateway

## Composer

composer install

## Copy .env

cp .env.example .env

## Configure .env

Set mysql db connection, service basic auth credentials and URL for micro services

## Migrate db

php artisan migrate

## Run LumenApiGateway

php -S localhost:8000 -t public

## Import Postman collection and environment

Configure host and port in the endpoints

## Official Documentation

Documentation for the User preferences Micro service in Lumen can be found on the [LumenUserPreferencesDemo](https://github.com/Dipenduroy/LumenUserPreferencesDemo).

Documentation for the User subjects Micro service in Lumen can be found on the [LumenUserSubjectsDemo](https://github.com/Dipenduroy/LumenUserSubjectsDemo).

## Configure User preferences Micro service URL

Set correct url for USER_PREFERENCES_SERVICE in .env file

## Configure User subjects Micro service URL

Set correct url for USER_SUBJECTS_SERVICE in .env file
