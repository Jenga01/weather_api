
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

Enter `api/products/recommended/{city}` in your browser or postman

Expected result:

```JSON
{
    "city": "vilnius",
    "0": [
        "recommendations",
        {
            "date": "2020-10-12 14:00:00",
            "city": "vilnius",
            "product": [
                {
                    "id": 8,
                    "condition": "isolated-clouds",
                    "products": [
                        {
                            "id": 13,
                            "name": "soluta vero quidem",
                            "sku": "ABC880",
                            "price": 98,
                            "created_at": null,
                            "updated_at": null,
                            "pivot": {
                                "weather_id": 8,
                                "product_id": 13
                            }
                        }
                    ]
                }
            ]
        },
 ```
