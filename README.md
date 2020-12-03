# ePayments

This project is a simulation of an E-Wallet.

### Local Development

This project is built with HTML, CSS, PHP, JavaScript and MySQL.

### Installing Prerequisites

You need to install [XAMPP/WAMPP/LAMPP](https://www.apachefriends.org/download.html ), or any other PHP + MySQL Server.

### Clone Project

You can simply go to the document root (`/opt/lampp/htdocs/` for LAMPP) and clone the project using `git` as:

```bash
cd /opt/lampp/htdocs/
git clone 'https://github.com/bharats97/epayments.git'
```

### Start the Server

Start the Apache and MySQL Server. For LAMPP, this can be done as follows:

```bash
sudo /opt/lampp/lampp startapache
sudo /opt/lampp/lampp startmysql
```

### Application Configuration

Go to [phpMyAdmin](http://localhost/phpmyadmin/) (for XAMPP/WAMPP/LAMPP) and run the following query to setup the database:

```sql
DROP DATABASE IF EXISTS `epayments`;

CREATE DATABASE IF NOT EXISTS `epayments`;

USE `epayments`;

CREATE TABLE IF NOT EXISTS `user_details` (
    `first_name` VARCHAR(30) NOT NULL,
    `middle_name` VARCHAR(30) DEFAULT NULL,
    `last_name` VARCHAR(30) DEFAULT NULL,
    `contact` VARCHAR(16) NOT NULL,
    `user_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    UNIQUE (`contact`),
    INDEX (`contact`)
);

CREATE TABLE IF NOT EXISTS `login_credentials` (
    `contact` VARCHAR(16) NOT NULL PRIMARY KEY,
    `password` VARCHAR(30) NOT NULL,
    FOREIGN KEY (`contact`) REFERENCES `user_details`(`contact`)
);

CREATE TABLE IF NOT EXISTS `user_wallet` (
    `user_id` INT NOT NULL PRIMARY KEY,
    `wallet_balance` DOUBLE NOT NULL DEFAULT '0.0',
    FOREIGN KEY (`user_id`) REFERENCES `user_details`(`user_id`)
);

CREATE TABLE IF NOT EXISTS `transactions` (
    `sender_id` INT DEFAULT NULL,
    `receiver_id` INT DEFAULT NULL,
    `sender_name` VARCHAR(50) NOT NULL,
    `receiver_name` VARCHAR(50) NOT NULL,
    `timestamp` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `amount` DOUBLE NOT NULL,
    `transaction_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `comment` VARCHAR(200) DEFAULT NULL,
    INDEX (`sender_id`),
    INDEX (`receiver_id`)
);
```

Update the database credentials in [app/connection/connect.php](./app/connection/connect.php).

```php
$connection = new mysqli('localhost', 'username', 'password', 'epayments');
```

Make sure you change the database configuration according to your credentials. Mostly, you'd need to change values for these variables:

- `username` - This is your MySQL user.
- `password` - This is your MySQL password for that user.

That's pretty much it. You're done with the configuration.

Now you can head to the [Sign Up page](http://localhost/epayments/signup/) and create an account for yourself.
