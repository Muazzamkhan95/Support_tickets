# Support Ticket System

A Laravel-based multi-database support ticketing system.

## Features

- Ticket submission by users
- Admin panel to view/respond
- Per-department ticket routing with multiple DB connections
- Tracking via UUID
- Single admin seeder
- Auth via Laravel Breeze

## Installation

See `Support_Ticket_System_Setup_Guide.docx` for full setup instructions.

## Quick Start

```bash
git clone https://github.com/Muazzamkhan95/Support_tickets.git
cp .env.example .env
composer install
npm install && npm run dev
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve

#Access URL's

http::localhost:8000 (For submiting tickets)
http::localhost:8000/login (For Admin panel login)
http::localhost:8000/admin (For Admin panel Access)

username: admin@example.com
password: password

