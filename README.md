# Laravel Api Demo 🏝️

## Introduction

A simple laravel Api following this [conditions]


## Conditions 


The prices are integers for example, 100.00€ would be 10000.
  
1. [x] You can store the products as you see fit (json file, in memory, rdbms of choice)
2. [x] Products in the "insurance" category have a 30% discount.
3. [x] The product with sku = 000003 has a 15% discount.
4. [x] Provide a single endpoint. GET /products.
5. [x] Can be filtered by category as a query string parameter.
6. [x] (optional) Can be filtered by price as a query string parameter, this filter applies before discounts are applied.
7. [x] Returns a list of Products with the given discounts applied when necessary Product model.
8. [x] price.currency is always EUR.
9. [x] When a product does not have a discount, price.final and price.original should be the same number and discount_percentage should be null.
10. [x] When a product has a discount, price.original is the original price, price.final is the amount with the discount applied and discount_percentage represents the applied discount with the % sign.

Example product with a discount of 30% applied:  
`    {
      "sku": "000001",
      "name": "Full coverage insurance",
      "category": "insurance",
      "price": {
          "original": 89000,
          "final": 62300,
          "discount_percentage": "30%",
          "currency": "EUR"
      }
    }`
  
  Example product without a discount:
  
      `{
        "sku": "000002",
        "name": "Compact Car X3",
        "category": "vehicle",
        "price": {
            "original": 89000,
            "final": 89000,
            "discount_percentage": null,
            "currency": "EUR"
        }
      }`
      
## Dataset.       
dataset seeded tp the database: 

`{
    "products": [
      {
        "sku": "000001",
        "name": "Full coverage insurance",
        "category": "insurance",
        "price": 89000
      },
      {
        "sku": "000002",
        "name": "Compact Car X3",
        "category": "vehicle",
        "price": 99000
      },
      {
        "sku": "000003",
        "name": "SUV Vehicle, high end",
        "category": "vehicle",
        "price": 150000
      },
      {
        "sku": "000004",
        "name": "Basic coverage",
        "category": "insurance",
        "price": 20000
      },
      {
        "sku": "000005",
        "name": "Convertible X2, Electric",
        "category": "vehicle",
        "price": 250000
      }
    ]
  }`


## Official Documentation

### Installation

Clone repository


install dependencies
```bash

php composer.phar install

```

create a database called `apitest` on your mysql server

Run migrations
```bash
# Run migrations
php artisan migrate

```

Seed Database 
```bash
# Run migrations
php artisan db:seed

```

Start your application
```bash
# Serve the application...
php artisan serve
```

## Endpoints

1. GET|HEAD  api/products   
2. POST      api/products   
3. GET|HEAD  api/products/category/{category}   
4. GET|HEAD  api/products/{sku} 
5. PUT       api/products/{sku}   
6. DELETE    api/products/{sku}  

### Example

1. http://127.0.0.1:8000/api/products/000003
2. http://127.0.0.1:8000/api/products
3. http://127.0.0.1:8000/api/products/category/insurance
