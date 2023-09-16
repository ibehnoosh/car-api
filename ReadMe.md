### Car Reviews API

This is a RESTful API built with Symfony 6 and API Platform 3. The API handles two entities: Car and Reviews.
Requirements

    PHP 8.0 or higher
    Composer
    PostgreSQL 13 or higher
    Symfony CLI (Optional)
    Git

Features

    RESTful API endpoints for Car and Reviews entities
    PostgreSQL database support

How to Run the Application
Clone the repository

Clone the repository to your local machine.

bash

git clone https://github.com/ibehnoosh/car-api.git

Navigate to the project directory.

bash

cd car-api

Install PHP Dependencies

Run the following command to install PHP dependencies using Composer.

bash

composer install

Database Setup

Create a new PostgreSQL database and update the .env or .env.local file with the correct database credentials.

env

# .env or .env.local
DATABASE_URL=postgresql://username:password@localhost:5432/your_database_name

Run the database migrations to create the necessary tables.

bash

php bin/console doctrine:migrations:migrate

Confirm the migrations when prompted.
Start the Symfony Server

To start the Symfony development server, you can run:

bash

symfony server:start

Or if you don't have the Symfony CLI installed:

bash

php -S localhost:8000 -t public/

Access the Application

The application should now be accessible at http://localhost:8000 or http://127.0.0.1:8000.
API Endpoints

    List all cars: GET /v1/cars
    Get a single car: GET /v1/cars/{id}
    Create a new car: POST /v1/cars
    Update a car: PUT /v1/cars/{id}
    Delete a car: DELETE /v1/cars/{id}

Additional Endpoints

    Fetch five latest reviews of a given car with a rating above 6 stars: GET /v1/cars/{id}/high

Testing