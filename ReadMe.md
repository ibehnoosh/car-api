# Car Reviews API

This is a RESTful API built with Symfony 6 and API Platform 3. The API handles two entities: Car and Reviews.

### Requirements
 - PHP 8.0 or higher 
 - Composer
 - PostgreSQL 13 or higher
 - Symfony CLI

### Features
- RESTful API endpoints for Car and Reviews entities
- PostgreSQL database support


### How to Run the Application

Clone the repository

Clone the repository to your local machine.
```
git clone https://github.com/ibehnoosh/car-api.git
```

Navigate to the project directory.
```
cd car-api
```

Install PHP Dependencies

```composer install```

Database Setup

Create a new PostgreSQL database and update the .env or .env.local file with the correct database credentials.

```
# .env or .env.local
DATABASE_URL=postgresql://username:password@localhost:5432/your_database_name
```
Run the database migrations to create the necessary tables.

```
php bin/console doctrine:migrations:migrate
```

Confirm the migrations when prompted.
Start the Symfony Server
```
symfony server:start
```
Or if you don't have the Symfony CLI installed:
```
php -S localhost:8000 -t public/
```
Access the Application

The application should now be accessible at http://localhost:800/api http://127.0.0.1:8000/api

### API Endpoints

    List all cars: GET /v1/cars
    Get a single car: GET /v1/cars/{id}
    Create a new car: POST /v1/cars
    Update a car: PUT /v1/cars/{id}
    Delete a car: DELETE /v1/cars/{id}

Additional Endpoints

    Fetch five latest reviews of a given car with a rating above 6 stars: GET /v1/cars/{id}/high

Testing