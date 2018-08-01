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