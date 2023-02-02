# Avatar Management System
## _Laravel 8.4_

Highlight of the project.
- login
- Receive all items group by categories
- Receive the current avatar user state
- Buy a new item
- Dress Up with a new set of items.

## Setup

- Extract the code or clone the project from the github repository link - shared in mail
- PHP version : 7.4
- After clone, go to the project and run `composer install`
- Copy .env.example to .env and set the database credentials.
- Run `php artisan migrate --seed`
    This commande makes
    
        User : nikita@gmail.com / passoword
        Default Category (11)
        Item (50)

Now you are all set to run the project 

```sh
http://localhost/avatar-management/api
```

# API Details
    Header : Bearer Token of logged user and Accept : application/json

- Login
    - Url : /auth/login
    - Method : POST
    - Parameter : 
        email => string
        password => string

- Receive all items group by categories
    - Url : /get-categories-with-items
    - Method : GET

- Receive the current avatar user state
    - Url : /get-current-state-with-items
    - Method : GET

- Buy a new item
    - Url : /buy-a-item
    - Method : POST
    - Parameter : 
        item_id => string

- Dress Up with a new set of items.
    - Url : /change-avatar
    - Method : POST
    - Parameter : 
        items => associative array

## For more details please check the file : Avatar Management API.pdf
