# Laravel Library CRUD Application

A Laravel web application for managing a small library book list.

## Description

Laravel Library CRUD Application is a training web project built with Laravel.
The application allows users to view, create, edit and delete books through a simple web interface.

The project also includes a multilingual interface with Ukrainian and English language switching.

## Features

* book list page
* create book form
* edit book form
* delete book action
* Ukrainian and English interface
* Laravel routing
* Blade templates
* controller-based logic
* JSON-based book storage

## Technologies

* PHP 8.1+
* Laravel 10
* Blade
* Bootstrap
* HTML5
* CSS3

## Project Structure

```text
lr12/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Api/
│   │       ├── BooksClientController.php
│   │       ├── Controller.php
│   │       └── LangController.php
│   ├── Models/
│   │   └── User.php
│   └── Support/
├── config/
├── database/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   ├── lang/
│   │   ├── en/
│   │   │   └── books.php
│   │   └── uk/
│   │       └── books.php
│   └── views/
│       ├── books/
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── index.blade.php
│       └── layouts/
│           ├── app.blade.php
│           ├── footer.blade.php
│           └── header.blade.php
├── routes/
│   ├── api.php
│   └── web.php
├── storage/
├── artisan
├── composer.json
├── composer.lock
├── package.json
└── vite.config.js
```

## Installation

Clone the repository:

```bash
git clone https://github.com/AlexandraBalinskaiya/laravel-library-crud.git
```

Go to the project directory:

```bash
cd laravel-library-crud/lr12
```

Install PHP dependencies:

```bash
composer install
```

Create environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Start the local server:

```bash
php artisan serve
```

Open the application in the browser:

```text
http://127.0.0.1:8000/client/books
```

## Screenshots

Screenshots can be added to the README to show:

* book list page
* add book page
* edit book page
* Ukrainian interface
* English interface

## Author

Oleksandra Balinska
