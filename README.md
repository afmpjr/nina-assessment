/home/dev/projects/nina.care/README.md

# Laravel Application with User and Previous Experiences

This is a Laravel application built for listing and filtering users (aka babysitters and au pairs).

## Requirements

- PHP
- Composer
- MySQL or equivalent
- Git

## Features

- Retrieve all users and filter by name, age, location, and language proficiencies.
- List all previous experiences of a user.


## Installation

Follow these steps to set up the application locally:

1. Clone the repository:

```bash
git clone https://github.com/afmpjr/nina-assessment.git
cd nina-assessment
```

2. Install the required packages using Composer:

```bash
composer install
```

3. Make a copy of .env.example and rename it to .env:

```bash
cp .env.example .env
```

4. Edit the .env file to set up your local database, cache, and other configurations.

5. Generate a new application key:

```bash
php artisan key:generate
```

6. Run the migrations and seed the database:

```bash
php artisan migrate:fresh --seed
```

7. Run the application server:

```bash
php artisan serve
```

8. Access the API endpoints using a tool like Postman or your web browser.

## API Endpoints

- `GET /users`: Retrieve all users with pagination and filtering options.
- `GET /users/{user_id}/previous-experiences`: Retrieve previous experiences of a user with pagination.
- `POST /previous-experiences`: Add a new previous experience under a user.
