<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="70" alt="Laravel Logo">
</p>


# Bike Tours — Laravel Project  
**Status:** Work in Progress

A simple and modern Laravel application for creating, managing, and exploring bicycle tours.

---

## Features
- CRUD operations for tours using Eloquent ORM and database migrations
- User authentication (registration, login, logout)
- Tour filtering by difficulty (easy, medium, hard)
- Contact form with message storage in the database
- Browse all tours
- Tour search functionality
- Tour comments and ratings

---

## Roadmap

- Admin panel for managing tours and users
- Support for audio and video content in tours
- Further feature expansion and additional modules

---

### Tech Stack
- ⚙️ Laravel 12  
- 🐘 PHP 8.4  
- 🗄️ MySQL  
- 🎨 Blade templating
- 💅 Tailwind CSS
- 📦 Composer  
- 🧩 Eloquent ORM
- 🟧 TablePlus (database management)

## Autor: Predrag Jovanović

---

## Installation
```bash
git clone git@github.com:Pedja3/Bike-Tours-Laravel.git
cd Bike-Tours-Laravel
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve





