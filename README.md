
## Requirements

- MySQL
- PHP
- Web Server
  You can use XAMPP for a one off install

## Installation
1. Clone the project repository
2. Create a database for the project
3. copy .env.example to .env
4. Enter the database connection configurations in the .env file
5. Then run the following commands in the terminal
```bash
  npm install
  npm run dev
  php artisan migrate
```
6. Visit [Mailtrap](https://mailtrap.io/) and sign up for an account
7. Copy the email configuration and add it in the .env file under mail configuration
8. Serve the following command in the terminal to start the web server
```bash
   php artisan Serve
```

## Code
  ### Authentication
  1. RegistrationController - New User registration
  2. LoginController - User Login registration
  3. ResetPassword - password reset
  4. verificationController - User email verification

  ### Config
  1. Databases/migrations - Database migration files for application databases.
  2. .env file describes the application configuration for the database
```
DB_CONNECTION=mysql
DB_HOST=host
DB_PORT=port
DB_DATABASE=name
DB_USERNAME=user
DB_PASSWORD=password
```
### Shop
### helpers
1. switch - ProfileController switch method switches the user between supplier and customer
2. update - ProfileController updatePassword method updates user password
3. index - Index.blade.php is the main home page

## Supplier
1. Product Controller
    - Add Product - Store Method in product Controller
    - Delete Product - Destroy Method
    - Get product - @Index function -  get all products 
                    @edit function - gets single product

2. Purchase Controller
    - Add purchase - Store Method in purchase Controller
    - Delete purchase - Destroy Method
    - Get purchase - @Index function -  get all purchase 
                    @edit function - gets single purchase

3. sale Controller
    - Add sale - Store Method in sale Controller
    - Delete sale - Destroy Method
    - Get sale - @Index function -  get all sale 
                    @edit function - gets single sale

4. Prepared Product
    - Prepared product - ProductController @index method
    - edit prepared product Product Controller @preparedProduct method
    - search product Controller @ serach method

## kra
1. export purchase - kraController 
    - @exportAll method  - export all purchases to CSV file
    - @ExportCurrent Month method export only purchases of single month

## view 
  ### index
    - view\index.blade.php is the mian index file for all user- Application first page
  ### init 
    - Application session management App\config\config (Laravel session managment config)
  ### profile
    - views\supplier\profiles
  ### sales
    - views\supplier\sales
  ### purchases
    - views\supplier\purchases
  ### shop
    - views\supplier\shop

  ## templates
    - views\menu\customer
    - views\menu\sidebar
    - views\menu\supplier
    - views\menu\logged_out

 
