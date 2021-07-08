# p-robusta-api

The API for landing page of &lt;[Passerelles numériques Vietnam](https://www.passerellesnumeriques.org/)&gt;

## Developers

-   Cu Nguyen &lt;[cunguyen.dev@gmail.com](cunguyen.dev@gmail.com)&gt;

-   Nguyen Ngoc Huy &lt;[huy.nguyen22@student.passerellesnumeriques.org](huy.nguyen22@student.passerellesnumeriques.org)&gt;

-   Pham Anh Tuan &lt;[tuan.pham22@student.passerellesnumeriques.org](tuan.pham22@student.passerellesnumeriques.org)&gt;

-   Le Thi Hong Hanh &lt;[hanh.le22@student.passerellesnumeriques.org](hanh.le22@student.passerellesnumeriques.org)&gt;

-   Nguyen Thi Diem &lt;[diem.nguyen22@student.passerellesnumeriques.org](diem.nguyen22@student.passerellesnumeriques.org)&gt;

## Requirements

-   [Composer](https://getcomposer.org/download/) &gt;=2.1.3
-   [Laravel](https://laravel.com/) &gt;=8.x

## Tech stacks

-   HTML/CSS/JavaScript
-   SASS/SCSS
-   Laravel
-   MySQL

## Getting Started

Step by step to run this app in your local

### Install packages

At your directory root, run:

```
composer install
```

```
php artisan key:generate
```

```
php artisan db:default
```

```
php artisan migrate --seed
```

```
php artisan config:clear
```

```
php artisan passport:keys
```

```
php artisan passport:purge
```

### Run server

```
php artisan serve
```

Open on web: http://localhost:8000 (this is by default, you can custom it)
URL of API: http://localhost:8000/api

### Access api

-   Registe an account in http://localhost:8000/api/register with a form data that have fields:
    {
    name : <your_user_name>
    email : <your_email>
    password : <your_password>
    c_password : <your_c_password>
    }

-   Login and get a access token in http://localhost:8000/api/login with a form data that have fields:
    {
    email : <your_email>
    password : <your_password>
    }

_You can update the source structures to follow your patterns._

_Note: Live-reload is supported_

```

```
