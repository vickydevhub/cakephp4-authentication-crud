# CakePHP 4 Authentication & CRUD

A small **CakePHP 4** learning project demonstrating how to build a basic web application with **MySQL**, database migrations, user registration, login, logout, password hashing, session-based authentication, and CRUD operations.

## 🚀 Features

- CakePHP 4
- PHP 7.4/8.x
- MySQL
- Database migrations
- User registration
- User login
- User logout
- Password hashing
- Session-based authentication
- Form validation
- Products CRUD
- CakePHP Bake
- MVC architecture

## 🛠️ Technologies

- PHP
- CakePHP 4
- MySQL
- Composer
- CakePHP Migrations
- CakePHP Authentication Plugin
- HTML
- CakePHP Form Helper

## 📁 Project Structure

```text
cakephp4-authentication-crud/
│
├── config/
│   ├── Migrations/
│   ├── app.php
│   ├── app_local.php
│   └── routes.php
│
├── src/
│   ├── Controller/
│   │   ├── AppController.php
│   │   └── UsersController.php
│   │
│   └── Model/
│       ├── Entity/
│       │   └── User.php
│       └── Table/
│           └── UsersTable.php
│
├── templates/
│   └── Users/
│       ├── login.php
│       └── register.php
│
├── webroot/
├── composer.json
└── README.md
```

## 📋 Requirements

Before starting, make sure you have:

- PHP 7.4 or PHP 8.x
- Composer
- MySQL
- XAMPP or another PHP development environment
- PHP `intl` extension enabled

Check PHP:

```bash
php -v
```

Check Composer:

```bash
composer -V
```

Check the `intl` extension:

```bash
php -m | findstr intl
```

## 📥 Installation

Clone the repository:

```bash
git clone https://github.com/YOUR_USERNAME/cakephp4-authentication-crud.git
```

Go into the project:

```bash
cd cakephp4-authentication-crud
```

Install dependencies:

```bash
composer install
```

## 🗄️ Database Setup

Create a MySQL database:

```sql
CREATE DATABASE cakephp_crud;
```

Configure the database in:

```text
config/app_local.php
```

Example:

```php
'Datasources' => [
    'default' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'cakephp_crud',
        'driver' => Cake\Database\Driver\Mysql::class,
        'port' => 3306,
    ],
],
```

## 🏗️ Database Migrations

Check migration status:

```bash
bin/cake migrations status
```

Run all migrations:

```bash
bin/cake migrations migrate
```

Rollback the latest migration:

```bash
bin/cake migrations rollback
```

The project contains migrations for tables such as:

```text
users
products
```

## 👤 User Authentication

The project uses the CakePHP Authentication plugin.

Install it with:

```bash
composer require cakephp/authentication
```

Load the plugin:

```bash
bin/cake plugin load Authentication
```

Authentication includes:

- Registration
- Login
- Logout
- Password hashing
- Session authentication
- Email/password verification

## 🔐 Password Hashing

Passwords are never stored as plain text.

During registration:

```text
User enters password
        ↓
CakePHP Entity setter
        ↓
PasswordHasher
        ↓
Hashed password
        ↓
MySQL
```

Example database value:

```text
$2y$10$...
```

The original password is never stored in the database.

## 📝 Registration

Open:

```text
http://localhost:8765/register
```

Example:

```text
Name: Vivek Kumar
Email: vivek@example.com
Password: secret123
```

The password will automatically be hashed before being stored.

## 🔑 Login

Open:

```text
http://localhost:8765/login
```

Enter the registered email and password.

Authentication flow:

```text
Login Form
    ↓
FormAuthenticator
    ↓
Find User
    ↓
Verify Password
    ↓
Create Session
    ↓
Authenticated User
```

## 🚪 Logout

Open:

```text
http://localhost:8765/logout
```

The user's authentication session will be cleared.

## 📦 Products

The project also demonstrates a basic products table.

Example structure:

```text
products
├── id
├── name
├── description
├── price
├── quantity
├── created
└── modified
```

Example migration:

```bash
bin/cake bake migration CreateProducts
```

Run:

```bash
bin/cake migrations migrate
```

## 🧰 CakePHP Bake

CakePHP Bake can generate models, controllers, and CRUD code.

Generate a model:

```bash
bin/cake bake model Users
```

Generate a controller:

```bash
bin/cake bake controller Users
```

Generate complete CRUD:

```bash
bin/cake bake all Products
```

## ▶️ Run the Application

Start the CakePHP development server:

```bash
bin/cake server
```

The application will normally be available at:

```text
http://localhost:8765
```

Authentication URLs:

```text
/register
/login
/logout
```

## 🔄 Migration Workflow

The typical CakePHP migration workflow is:

```text
Create Migration
       ↓
Write Database Changes
       ↓
Check Migration Status
       ↓
Run Migration
       ↓
Verify Database
       ↓
Generate/Update Model
       ↓
Build Controller
       ↓
Build Views
```

Useful commands:

```bash
# Create migration
bin/cake bake migration CreateUsers

# Check migrations
bin/cake migrations status

# Run migrations
bin/cake migrations migrate

# Rollback migration
bin/cake migrations rollback

# Generate model
bin/cake bake model Users

# Generate controller
bin/cake bake controller Users

# Generate CRUD
bin/cake bake all Products

# Start server
bin/cake server
```

## 🎯 Learning Goals

This project is intended for learning CakePHP 4 concepts including:

- MVC architecture
- CakePHP ORM
- Entities
- Table classes
- Database migrations
- MySQL integration
- CakePHP Bake
- Form handling
- Validation
- Authentication
- Password hashing
- Sessions
- CRUD operations
- Routing
- Middleware

## 📌 Future Improvements

Possible additions:

- User authorization/roles
- Protected dashboard
- Product CRUD with authentication
- Pagination
- Search and filtering
- REST API
- API authentication
- PHPUnit tests
- Integration tests
- CSRF protection
- Better form validation
- Docker setup

## 👨‍💻 Author

Vivek Kumar

Senior PHP/Laravel Developer | Full-Stack Developer

## 📄 License

This project is created for learning and demonstration purposes.