# AKC353_4 Project

## Overview
This project is part of COMP 353 Database X 2234, under the supervision of Professor Nematollah Shiri. It was developed by Oudghiri, Rahman, Carbon, and Puntuleng. The goal is to manage and interact with a database system for tracking employees, vaccinations, infections, and related entities.

## Prerequisites
To run this project, you need the following:
- A local development environment.
- [XAMPP](https://www.apachefriends.org/index.html) installed on your machine (tested with Apache and MySQL modules).
- A MySQL database named **`akc353_4`** properly configured.


### Setting up the Database
1. Log in to your local MySQL server:

2. Create the database:

3. Execute the provided SQL script `ddl.sql` to create tables and relationships and populate the database with sample data

## Running the Project Locally

1. **Start XAMPP:**
   - Open the XAMPP Control Panel.
   - Start the Apache and MySQL modules.

2. **Place Files in the XAMPP Directory:**
   - Copy the project folder into the `htdocs` directory of your XAMPP installation (e.g., `C:\xampp\htdocs\akc353_4`).

3. **Access the Application:**
   - Open a web browser and go to: `http://localhost/akc353_4`.

4. **Verify the Database Connection:**
   - Ensure the database configuration in `DBHelper.php` points to the `akc353_4` database:
     ```php
     private $host = "127.0.0.1";
     private $user = "root";
     private $password = ""; // Default for XAMPP
     private $database = "akc353_4";
     ```

## Testing
- **Environment:**
  - Tested locally on a Windows machine using XAMPP.
  - Apache and MySQL modules were turned on during testing.

- **Steps to Test:**
  1. Set up the database and import the schema.
  2. Start XAMPP and navigate to the application in your browser.
  3. Launch the Apache admin to reach main menu

- **Debugging Tips:**
  - Use the XAMPP Control Panel logs to debug Apache or MySQL issues.
  - For PHP errors, enable error reporting in `php.ini`:
    ```ini
    display_errors = On
    ```

## Notes
- Ensure that all database tables and relationships are correctly created before running the project.
- All development and testing were performed using XAMPP with PHP 8.1 and MySQL 8.

## Acknowledgments
This project was completed as part of the COMP 353 coursework. Special thanks to Professor Nematollah Shiri for guidance throughout the term.

