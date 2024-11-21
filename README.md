# Bill Payments System API

## Project Description
A Laravel-based RESTful API for managing users and their financial transactions.

## Prerequisites
- PHP 8.1+
- Composer
- MySQL
- Laravel 10.x

## Setup Instructions

1. Clone the repository
```bash
git clone https://github.com/BankMoney24/bill-payments-system.git
cd bill-payments-system
```

2. Install Dependencies
```bash
composer install
```

3. Create .env file
```bash
cp .env.example .env
```

4. Generate Application Key
```bash
php artisan key:generate
```

5. Configure Database
- Open .env file
- Set your database credentials
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bill_payments
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run Migrations
```bash
php artisan migrate
```

7. Start the Server
```bash
php artisan serve
```

## Running Tests
```bash
php artisan test
```

## Postman Collection
(https://www.postman.com/https://dickson-0566.postman.co/)

## API Endpoints

### Users
- GET /api/v1/users
- POST /api/v1/users
- GET /api/v1/users/{user}
- PUT /api/v1/users/{user}
- DELETE /api/v1/users/{user}

### Transactions
- GET /api/v1/transactions
- POST /api/v1/transactions
- GET /api/v1/transactions/{transaction}
- PUT /api/v1/transactions/{transaction}
- DELETE /api/v1/transactions/{transaction}
