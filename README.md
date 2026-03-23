![](https://cs2team53.cs2410-web01pvm.aston.ac.uk/images/placeholder1.png)
--
<p align="center">
  <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=larave&logoColor=white" />
    <img src="https://img.shields.io/badge/php-%23FF2D20.svg?style=for-the-badge&logo=php&logoColor=white" />
    <img src="https://img.shields.io/badge/tailwindcss-%23FF2D20.svg?style=for-the-badge&logo=tailwindcss&logoColor=white" />
</p>

# YouZoo E-Commerce Platform

YouZoo is a modern, pet-focused e-commerce application built with Laravel. It connects pet owners with high-quality products for their furry, feathered, or scaled friends.

## Features

-   **User Authentication**: Secure login and registration.
-   **Product Catalog**: Browse products by category (Food, Toys, Accessories, Healthcare, Clothing).
-   **Shopping Cart**: Add items, view cart, and proceed to checkout.
-   **Order History**: Users can view their past orders on the dashboard.
-   **Contact Form**: Users can get in touch with support.
-   **Responsive Design**: Fully responsive layout using Tailwind CSS.
-   **Dark Mode**: Built-in dark/light mode toggle.

## Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM
-   MySQL or SQLite

## Installation

1.  **Clone the repository:**
    ```bash
    git clone <repository_url>
    cd group53
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install Node dependencies:**
    ```bash
    npm install
    ```

4.  **Set up environment variables:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Configure your database credentials in `.env` and email credentials in `.env`*

5.  **Run migrations and seed the database:**
    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Build frontend assets:**
    ```bash
    npm run build
    ```

7.  **Serve the application:**
    ```bash
    php artisan serve
    ```

## Test User Credentials

To access the platform immediately for testing purposes, use the following credentials (seeded by `UsersTableSeeder`):

| Role  | Email              | Password |
| :---  | :---               | :---     |
| User  | **youzoo@REDACTED.com** | **password** |

*(Note: The default password for seeded users in Laravel factories is typically 'password' unless changed in the factory definition.)*

## Test Stripe Checkout
To test the Stripe checkout without using real money or cards, you can use this test card provide by Stripe (mmore information [here](https://docs.stripe.com/testing?locale=en-GB)

|Brand | Card Number | CVC       | DATE |
|:--- | :---  | :---               | :---     |
| Visa | **4242424242424242** | **Any 3 Digits** | **Any Future Date** |
| Mastercard | **5555555555554444** | **Any 3 Digits** | **Any Future Date** |
| American Express | **378282246310005** | **Any 4 Digits** | **Any Future Date** |
| Diners Club | **3056930009020004** | **Any 3 Digits** | **Any Future Date** |



## Project Structure

-   `app/Http/Controllers`: Contains application logic (ProductController, CartController, etc.).
-   `resources/views`: Blade templates for the UI.
-   `routes/web.php`: Application routes.
-   `database/seeders`: Seeders for populating the database with initial data.

## Contributing

1.  Fork the repository.
2.  Create your feature branch (`git checkout -b feature/AmazingFeature`).
3.  Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4.  Push to the branch (`git push origin feature/AmazingFeature`).
5.  Open a Pull Request.

<sup><sub>This project was developed for the CS2TP Module (2025-2026) at Aston University</sub></sup>
