Here’s a **`README.md`** file for your GitHub project, detailing the structure and functionality of the **Online Booking System** with an **MVC architecture** in PHP.

# Online Booking System (PHP MVC)

This project is an **Online Booking System** developed using **PHP**, following the **MVC (Model-View-Controller)** architecture and **OOP (Object-Oriented Programming)** principles. The system supports multiple user roles, including **Admin**, **Service Providers**, and **Customers**. It allows users to search, book, and manage services like appointments, consultations, and other offerings.

## Table of Contents

- [Online Booking System (PHP MVC)](#online-booking-system-php-mvc)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
    - [Prerequisites](#prerequisites)
    - [Steps](#steps)
  - [Features](#features)
  - [User Roles \& Processes](#user-roles--processes)
    - [Admin](#admin)
    - [Service Provider](#service-provider)
    - [Customer](#customer)
  - [Technologies Used](#technologies-used)
  - [License](#license)

## Installation

To set up the **Online Booking System** on your local machine, follow these steps:

### Prerequisites
- PHP 7.4 or higher
- MySQL Database
- Apache/Nginx server (with mod_rewrite enabled for clean URLs)

### Steps

1. **Clone the repository:**

   ```bash
   git clone https://github.com/rahulv202/Online-Booking-System
   cd Online-Booking-System
   ```
2. **Install Dependencies:**
     ```bash
   composer install
   ```
    ```bash
   composer init
   ```
    ```bash
   composer dump-autoload
   ```

3. **Set up the database:**
   - Create a new MySQL database Name `obs` in your MySQL server.
   - Import the provided database schema (see `obs.sql`) into MySQL.
   - Create a `config/config.php` file (or modify `config/config.php`) and set your **DB_HOST**, **DB_NAME**, **DB_USER**, and **DB_PASS**.


4. **Start the application:**
   - php -S localhost:8000 -t public
   - Navigate to `http://localhost:8000/` in your browser.
   
   Now the application should be up and running!


## Features

1. **Admin Features:**
   - Manage **Users** (Service Providers and Customers).
   - Add, edit, or delete **Services** offered by Service Providers.
   - View and manage **Bookings** made by customers (e.g., mark as completed or canceled).
   -
2. **Service Provider Features:**
   - Add, edit, or delete **Services** they offer.
   - Set availability for their services (dates and times).
   - View and update **Bookings** (e.g., mark as completed, or reschedule appointments).

3. **Customer Features:**
   - view available **Services** based on category, price, and provider.
   - **Book Services** by current date and time.
   - **Modify or Cancel Appointments**.
   

## User Roles & Processes

### Admin
- **Manage Users**: Create, edit, and delete Service Providers and Customers.
- **Manage Services**: Add, edit, and delete services provided by Service Providers.
- **Manage Bookings**: View, update, or cancel bookings for any user.

### Service Provider
- **Add Services**: List and manage the services they offer.
- **Set Availability**: Define available dates and times for services.
- **View and Update Bookings**: View upcoming bookings, mark them as completed or canceled.

### Customer
- **Search Services**: Find available services by category, provider, or price.
- **Book Appointments**: Reserve time slots for services.
- **Modify or Cancel Bookings**: Reschedule or cancel existing appointments.

## Technologies Used

- **PHP** (for backend logic and server-side scripting)
- **MySQL** (for the database)
- **HTML/CSS** (for frontend UI)
- **Apache** (for the web server)
- **PDO** (for database interactions in a secure manner)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.





