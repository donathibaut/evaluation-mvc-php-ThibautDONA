# evaluation-mvc-php-ThibautDONA

Creation of the "Touche pas au klaxon" intranet site for creating and sharing carpool routes.

Table of Contents:

- Prerequisites
- Installation
- Usage

## Prerequisites

This project uses the following resources:

- git
- XAMPP
- Apache
- PHP
- Composer
- PhpMyAdmin (MySQL database)
- Node.js v24.12.0
- npm

## Installation

||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||  
/ ! \ .ENV => You will find a .env.example file in the /env/ directory

|-> Create a .env file in this directory that includes the same variables.
You will add the values corresponding to your project configuration.

---

.env.example:
DB_USERNAME="username" - (username with database permissions)
DB_PASSWORD="password" - (the user's password)
DB_HOST="127.0.0.1" - (loopback IP address)
DB_PORT="xxxx" - (port associated with the database)
DB_NAME="bdd-tpak" - (database name)

---

PS: Sections of the README that reference the .env file will be marked with \*\*\*  
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

### GIT

1. Install git:
   https://git-scm.com

   Clone the repository:
   In your terminal, use:

   ```bash
   git clone https://github.com/donathibaut/evaluation-mvc-php-ThibautDONA
   ```

### XAMPP

2. Install XAMPP:
   https://www.apachefriends.org/fr/index.html

### APACHE / PHP

3. Place the project in the htdocs directory of your XAMPP installation
   (example: XAMPP/htdocs/project-folder).

   Next, from the XAMPP Control Panel, click the "Start" button for the "Apache" module
   to start it.
   (This module will allow you to render PHP files in your browser.)

### COMPOSER

4. Install Composer using the installer available on this page:
   https://getcomposer.org/download/

   After that, open a terminal at the root of your project and run the command:

   ```bash
   composer install
   ```

### PHPMYADMIN / DATABASE\*\*\*

5. Go to PhpMyAdmin:
   On the XAMPP interface, click the "Start" buttons for the MySQL module.
   Then, click the "Admin" button for this module. This will take you to PhpMyAdmin.

   Once there, go to the SQL tab available from the home page and paste the script contained
   in the bdd-tpak.sql file (annexes/bdd-tpak.sql).

   WARNING => Replace the "DB\_" values (e.g., DB_USERNAME) with the corresponding values from the .env file.

   Once that's done, navigate to the newly created database, go to the SQL tab within it,
   and paste the insert.sql script.

   The database is now ready!

### NODE.JS / NPM (required for Bootstrap)

6. Install nvm:
   https://www.nvmnode.com/guide/installation.html

   Install Node.js + npm:
   In the terminal, run:

   ```bash
   nvm install 24.12.0
   ```

   then:

   ```bash
   nvm use 24.12.0
   ```

   To check if it is installed correctly:

   ```bash
   node -v
   ```

   (You should see: v.24.12.0)

   Install the packages from package.json:
   In the terminal, navigate to the project root directory.
   In the terminal, run:

   ```bash
   npm i
   ```

## Usage

### API \*\*\*

1. Config.php (directory: /Core/Config.php) => this file uses data from .env.

### Launching the site

2. Keep Apache and the MySQL database running via XAMPP as indicated previously.

When everything is set up, go to:
http://localhost/"project-folder"/public/index.php

"project-folder" => name of the folder where the project will be located  
(refer to the htdocs folder mentioned above -> "APACHE / PHP" section)

### Usernames and Passwords

3. ! See the end of the PDF deliverable !
