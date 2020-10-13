
## Challenge description

Create a service, which returns product recommendations depending on the weather forecast.

## Used Tools

- Laravel 8
- Guzzle Http
- Meteo.lt API
- MySQL
- Faker library
- https://github.com/renoki-co/laravel-eloquent-query-cache

## Setup

Install missing dependencies: composer install

copy .env.example to .env and edit config by your environment

Generate APP_KEY in .env file: `php artisan key:generate`

Run migrations: `php artisan migrate`

Populate database with fake data run: `php artisan db:seed`

## Usage

Enter `api/products/recommended/{lithuanian-city}` e.g. `api/products/recommended/vilnius}` in your browser or Postman

Expected result:

```JSON
{
    "city": "vilnius",
    "0": [
        "recommendations",
        {
            "date": "2020-10-13 11:00:00",
            "0": [
                {
                    "id": 2,
                    "condition": "light-rain",
                    "products": [
                        {
                            "name": "officiis odio libero",
                            "sku": "ABC541",
                            "price": 78
                        },
                        {
                            "name": "doloremque voluptas cupiditate",
                            "sku": "ABC791",
                            "price": 72
                        }
                    ]
                }
            ]
        },
 ```
## Running feature tests

Execute `vendor/bin/phpunit` from the root folder
