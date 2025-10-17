# Simple PHP E-Commerce Application

This is a simple e-commerce application built with PHP and MySQL.

## Features

*   Admin panel for managing products and users.
*   Public-facing pages for browsing products, adding to cart, and checking out.
*   Basic user authentication for the admin panel.

## Requirements

*   PHP
*   MySQL
*   Apache (or any other web server)

## Setup

1.  **Clone the repository:**
    ```bash
    git clone <repository-url>
    ```

2.  **Create the database:**
    *   Start your MySQL server.
    *   Create a database named `ecommerce`.
    *   Create a user named `appuser` with password `password` and grant all privileges to the `ecommerce` database.
    *   You can use the following SQL commands:
        ```sql
        CREATE DATABASE ecommerce;
        CREATE USER 'appuser'@'localhost' IDENTIFIED BY 'password';
        GRANT ALL PRIVILEGES ON ecommerce.* TO 'appuser'@'localhost';
        FLUSH PRIVILEGES;
        ```

3.  **Import the database schema and seed data:**
    ```bash
    mysql -u appuser -ppassword ecommerce < sql/schema.sql
    mysql -u appuser -ppassword ecommerce < sql/seed.sql
    ```

4.  **Configure the database connection:**
    *   The database connection is configured in `config/db.php` to use environment variables. You can set these variables in your web server's configuration or by using a `.env` file with a library like `phpdotenv`.
    *   The following environment variables are used:
        *   `DB_HOST`: The database host (defaults to `localhost`).
        *   `DB_USER`: The database username (defaults to `appuser`).
        *   `DB_PASS`: The database password (defaults to `password`).
        *   `DB_NAME`: The database name (defaults to `ecommerce`).

5.  **Run the application:**
    *   Point your web server's document root to the `public` directory of this project.
    *   Open your browser and navigate to the appropriate URL (e.g., `http://localhost/`).

## Admin Access

*   **URL:** `/admin/login.php`
*   **Username:** `admin`
*   **Password:** `password`