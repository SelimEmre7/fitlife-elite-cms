# FITLIFE ELITE CMS

## Overview

FITLIFE ELITE CMS is a fitness-oriented content management system developed using pure PHP, MySQL, and the MVC (Model-View-Controller) architectural pattern.

The application allows users to create and manage fitness-related content while providing administrators with tools for content moderation and user management. The project was developed as part of the MVC Web Application Development course and follows object-oriented programming principles and secure coding practices.

---

## Main Features

### Authentication & User Management

* User registration
* User login and logout
* Password hashing using PHP password_hash()
* User roles (Admin / User)
* Profile page
* Change password functionality
* User-specific post management

### Post Management

* Create posts
* View posts
* Edit posts
* Delete posts
* Post detail page
* Search functionality
* Pagination

### Categories

* Create categories
* Edit categories
* Delete categories
* Organize posts by category

### Comment System

* Add comments to posts
* Display comments under posts
* User-based commenting

### Administration

* Dedicated admin dashboard
* User management panel
* Role-based access control
* Administrative content management

### Security

* PDO prepared statements (SQL Injection protection)
* XSS protection using htmlspecialchars()
* Session-based authentication
* CSRF protection on post creation forms
* Authorization checks for protected actions

### User Interface

* Bootstrap 5 responsive design
* Dark/Gold custom theme
* Dark/Light mode toggle
* Responsive navigation
* Cards, alerts, forms and dashboard components

---

## Technologies Used

* PHP 8+
* MySQL
* Bootstrap 5
* PDO
* MVC Architecture
* Object-Oriented Programming (OOP)

---

## Project Structure

```text
fitlife-cms/
│
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   └── Core/
│
├── public/
├── tests/
├── README.md
└── fitlife_cms.sql
```

---

## Installation Guide

### Requirements

* PHP 8+
* MySQL
* XAMPP or similar local server environment

### Setup

1. Download or clone the project.
2. Place the project inside the XAMPP htdocs directory.
3. Start Apache and MySQL.
4. Create a database named:

```sql
CREATE DATABASE fitlife_cms;
```

5. Import the provided SQL file:

```text
fitlife_cms.sql
```

6. Open the application:

```text
http://localhost/fitlife-cms/public/index.php
```

---

## Default Accounts

### Administrator

```text
Email: admin@fitlife.com
Password: admin123
```

### User

```text
Email: user@fitlife.com
Password: user123
```

Replace these credentials with the actual accounts contained in your database export if different.

---

## Database

The project uses a MySQL relational database containing the following main tables:

* users
* posts
* categories
* comments

Relationships are implemented using foreign keys.

---

## Unit Tests

The project includes basic PHPUnit test files:

* UserTest.php
* PostTest.php

These tests demonstrate the testing structure used for model functionality.

---

## Screenshots

Add screenshots before submission:

* Home Page
* Login Page
* Registration Page
* Profile Page
* Admin Dashboard
* Categories Page
* Post Detail Page

---

## Implemented Course Requirements

* MVC architecture
* Authentication system
* Authorization and roles
* CRUD operations
* Search functionality
* Pagination
* User profile management
* Comment system
* Responsive Bootstrap interface
* Security measures (SQL Injection, XSS, CSRF)
* Unit testing structure
* Documentation and installation guide

---

## Author

Selim Emre Gürtaş

MVC Web Application Development

FITLIFE ELITE CMS
