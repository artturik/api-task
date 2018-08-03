# Description

API for creating products and orders with products

Main files:

* Controllers [Product](app/Http/Controllers/ProductController.php) and [Order](app/Http/Controllers/OrderController.php)
* Models [Product](app/Models/Product.php) and [Order](app/Models/Order.php)
* [Routing](routes/api.php)
* [Migration](database/migrations/2018_08_01_171828_api.php)
* [Seed](database/seeds/ApiSeeder.php) and [Seed Factory](database/factories/ProductFactory.php)

# Requirements

* PHP 7.2+ (and extensions needed to run Laravel 5.6 application)
* Composer
* DB supported by Eloquent

# Installation

1. Clone the project
2. Run `composer install`
3. Configure database or create `database.sqlite` file inside `database` folder (for Sqlite)
4. Run `php artisan migrate` to create tables
5. Run `php artisan db:seed` to fill database with sample data

# Task:

Create a tiny RESTful web service with the following business requirements:

Application must expose REST API endpoints for the following functionality:

create product (price, productType, color, size)
create order (Collection of products and quiantities)
list all Orders
list all Orders by productType

Service must perform operation validation according to the following rules and reject if:

type + color + size already exists
Order is empty or total price is less then 10
N orders / second are received from a single country (essentially we want to limit number of orders coming from a country in a given timeframe)

Service must perform origin country resolution using a web service and store country code together with the order.
Because network is unreliable and services tend to fail, let's agree on default country code - "US".

Technical requirements:

You have total control over tools, as long as application is written in PHP and Laravel framework.

What gets evaluated:

Conformance to business requirements
Code quality, including testability
How easy it is to run and deploy the service (don't make us install Oracle database please 😉
Good luck and have fun!

UPD.
Для продуктов пока только та которая есть, на то что такой еще не существует, но предусмотреть что могут быть и другие. Все поля обязательные.

Не существующий продукт игнорируем.
Тип полей на твое усмотрение.
list all products не требуется