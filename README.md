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

Now you are all set to run the project : `php artisan serve`

```sh
127.0.0.1:8000
```

# API Details
    Header : Bearer Token of logged user and Accept : application/json

- Login
    Url : /auth/login
    Methog : POST
    Parameter : 
        email => string
        password => string

- Receive all items group by categories
    Url : /get-categories-with-items
    Methog : GET

- Receive the current avatar user state
    Url : get-current-state-with-items
    Methog : GET

- Receive all items group by categories
    Url : /buy-a-item
    Methog : POST
    Parameter : 
        item_id => string

- Receive all items group by categories
    Url : /change-avatar
    Methog : POST
    Parameter : 
        items => associative array

## For more details please check the file : API overview.txt
