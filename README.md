# LumenApiGateway

## Composer

composer install

## Copy .env

cp .env.example .env

## Configure .env

Set mysql db connection, service basic auth credentials and URL for micro services

## Migrate db

php artisan migrate

## Create Passport Encryption Keys

php artisan passport:install

## Generate a password based webclient in passport  

php artisan passport:client --password 

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

## Run Tests

- Install phpXdebug

- Generate the filter script for Xdebug to speed Up code coverage `vendor/bin/phpunit --dump-xdebug-filter build/xdebug-filter.php`

- Run Unit tests `php artisan migrate:fresh --seed && vendor/bin/phpunit --testdox --prepend build/xdebug-filter.php --coverage-html storage/reports/codecoverage`

- Generates Code coverage html report in `storage/reports/codecoverage` folder

- To view code coverage in standard output, add flag during run tests `--coverage-text`


