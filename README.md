
## Challenge description

Create a service, which returns product recommendations depending on the weather forecast.

## Used Tools

- Laravel 8
- Guzzle Http
- Meteo.lt API
- MySQL
- Faker library

## Setup

Install missing dependencies: composer install

copy .env.example to .env and edit config by your environment

Generate APP_KEY in .env file: `php artisan key:generate`

Run migrations: `php artisan migrate`

Populate database with fake data run: `php artisan db:seed`
