
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

 
