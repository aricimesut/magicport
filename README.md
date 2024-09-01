# Magic port

## Overview
Basic project management tool that allows users to create, update, delete, and manage projects and tasks. 
You can add projects and tasks via api endpoints and you can edit with basic frontend side.
Project has default user, when you run seed command, you can access the project. \
email: **test@exampl.com** \
password: **password**

In this project you can see, Service Layer pattern and Repository pattern together. This is more easy and clean.

## Installation

``` 
composer install
```

```
copy .env.example and rename it to .env
```
```
create your database and set to .env
```

``` 
php artisan migrate
```

``` 
php artisan db:seed
```

``` 
php artisan key:generate
```


