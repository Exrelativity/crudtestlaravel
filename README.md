# Laravel Api Demo 🏝️

## Introduction

A simple laravel Api following this [conditions]


## Conditions 

  
1. [x] A user can create an account, login to their dashboard, and reset their forgotten password. This authentication system should be a tokenized system that will expire at a certain time range.

2. [x] A user can have many products and many products can only belong to one user demonstrating proper use of ( one-to-many ) relationships.

3. [x] Users products should have [ NAME, DESCRIPTION, QUANTITY, UNIT PRICE, AMOUNT_SOLD etc ] as attributes. ( Use appropriate dataType for all fields ).

4. [x] Products can be updated and deleted by the owner. A user is not allowed to update or delete products that don't belong to them.

5. [x] Users should be listed with their Products in a DESC order.

6. [x] Products should be listed with pagination and in DESC order.

7. [x] Create a github Repository and push your code and share this repository when done.

8. [x] Demonstrate proper documentation standards by documenting your APIs using postman.


## Documentation

### Installation

Clone repository



install dependencies
```bash

php composer.phar install

```

create a database called `crudtestlaravel` on your mysql server

Run migrations
```bash
# Run migrations
php artisan migrate

```

Seed Database 
```bash
# seed the database
php artisan db:seed

```

Start your application
```bash
# Serve the application...
php artisan serve
```

## Endpoints
### api endpoints
  GET|HEAD  api/products   
  POST      api/products   
  GET|HEAD  api/products/{id}   
  PUT       api/products/{id}   
  DELETE    api/products/{id}   
  GET|HEAD  api/user    
  GET|HEAD  api/users   
  GET|HEAD  api/{userId}/products   
### web endpoints
  POST      email/verification-notification   
  POST      forgot-password   
  POST      login   
  POST      logout   
  POST      register   
  POST      reset-password   
  GET|HEAD  sanctum/csrf-cookie   
  GET|HEAD  verify-email/{id}/{hash}   

                                     


product added by a single user  
GET|HEAD api/{userId}/products  

### Examples

- http://127.0.0.1:8000/api/products/1
- http://127.0.0.1:8000/api/products


### data seeded to the database
Users = [
            {
                'name' : 'example1',
                'email' : 'example1@example.com',
                'password' : password,
            },
            {
                'name' : 'example2',
                'email' : 'example2@example.com',
                'password' : password,
            },
]

products = [
            {
                'name' : 'name1',
                'description' : 'description1',
                'quantity' : 5,
                'unitPrice' : 10,
                'amountSold' : 5,
                'userId' : 1
            },
            {
                'name' : 'name2',
                'description' : 'description2',
                'quantity' : 6,
                'unitPrice' : 11,
                'amountSold' : 6,
                'userId' : 1
            },
            {
                'name' : 'name3',
                'description' : 'description3',
                'quantity' : 10,
                'unitPrice' : 10,
                'amountSold' : 4,
                'userId' : 2
            },
            {
                'name' : 'name4',
                'description' : 'description4',
                'quantity' : 11,
                'unitPrice' : 17,
                'amountSold' : 4,
                'userId' : 2
            },
        ];
  
## Working with postman for development
  
### To access web route  

please run this command copy response from terminal and paste to Pre-request script on postman  
command format ...dev:postman {guard} {user?}  
  
```
php artisan dev:postman web
```

### To access api route
  
please run this command copy response from terminal and paste as Bearer token under Authorization on postman  
  
```
php artisan dev:postman api 1
```
the above command generates a token for user with id 1