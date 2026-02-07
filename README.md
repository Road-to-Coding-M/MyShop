<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## PHP / Laravel

This project summarizes and applies the core PHP/Laravel, including **MVC architecture**, **Routes**, **Controllers**, **CRUD operations**, **HTTP methods**, **Blade views**, **Migrations**, and **Seeders**.

## Requirements

- Backend: PHP 8.1+, Laravel
- Frontend: Blade templates, HTML, CSS, JavaScript
- Database: MySQL / MariaDB
- Dependency Management: Composer
- Frontend Tooling: Node.js, npm, Vite
- Version Control: Git (GitHub)

## Arquitectura MVC

### Model (M)

- Represents database tables using Eloquent ORM
- Handles data logic and relationships
- Located in: `app/Models`

### View (V)

- Responsible for UI rendering
- Uses the Blade templating engine
- Located in: `resources/views`

### Controller (C)

- Handles requests and application flow
- Connects Models and Views
- Located in: `app/Http/Controllers`

## Blade Views

views/
├─ layouts/
├─ app.blade.php
├─ create.blade.php
├─ edit.blade.php
└─ show.blade.php

## Migrations (Database Structure)

Location: database/migrations

- Create a migration: php artisan make:migration create_items_table
- Run migrations: php artisan migrate
- Rollback last migration: php artisan migrate:rollback

## Seeders (Initial Data)

Location: database/seeders

- Create a seeder: php artisan make:seeder ItemSeeder
- Run seeders: php artisan db:seed
- Rebuild database + seed: php artisan migrate:fresh --seed

## Installation Guide

Follow these steps to run the project locally:

1️. Clone the repository
git clone https://github.com/your-username/your-project.git
cd your-project

2️. Install PHP dependencies
composer install

3️. Install frontend dependencies
npm install

4️. Environment configuration
Copy the example environment file and generate the application key:

cp .env.example .env
php artisan key:generate

Edit .env and configure your database:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

## Database Setup

Run migrations to create database tables: php artisan migrate
(Optional) Seed the database with sample data: php artisan db:seed
Running the Application
Start the development server: php artisan serve
If using Vite for frontend assets: npm run dev
Then open your browser at: http://localhost:8000

## Project Structure (Overview)

app/
├── Http/
│ ├── Controllers/ # Application controllers
│ ├── Middleware/ # Request filters
├── Models/ # Eloquent models
database/
├── migrations/ # Database schema
├── seeders/ # Initial data
resources/
├── views/ # Blade templates
routes/
├── web.php # Web routes

## Key Features

- MVC architecture
- Eloquent ORM for database access
- Database migrations & seeders
- Session and authentication ready
- Secure configuration using .env
- Clean and readable code structure
