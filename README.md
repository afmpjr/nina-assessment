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

## Endpoints

- `GET /users`: returns a list of all the users in the database.
- `GET /users/search`: returns a list of users based on the search parameters provided in the query string.
- `GET /users/{id}`: returns a single user based on the ID provided in the URL.
- `GET /users/{id}/previous-experiences`: returns a list of all the previous experiences of the user specified by the ID provided in the URL.
- `GET /previous-experiences`: returns a list of all the previous experiences in the database.
- `GET /previous-experiences/{id}`: returns a single previous experience based on the ID provided in the URL.
