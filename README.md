# Learning Management System Using Laravel

This LMS will facilitate the management of courses, lessons, and user enrollments, providing both administrative and user-facing functionalities.

## Demo Video

Watch the demo video to see the application in action:

[![LMS Demo](https://img.youtube.com/vi/xbbNQPwb9U0/0.jpg)](https://www.youtube.com/watch?v=xbbNQPwb9U0)

## Deployment

The project is deployed at [Learning-Management-System](https://learning-management-system-laravel-pmxabkfay-basmalas-projects.vercel.app/).

## Project Setup

### Prerequisites

Before you begin, ensure you have the following installed on your machine:
- PHP (>= 8.0)
- Composer
- Node.js and npm
- MySQL or any other supported database

### Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/BasmalaMohamed46/Learning-Management-System-Laravel
    cd Learning-Management-System-Laravel
    ```

2. **Install dependencies:**

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Environment configuration:**

    Copy the `.env.example` to `.env` and configure your database and other necessary environment variables:

    ```bash
    cp .env.example .env
    ```

4. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

5. **Run database migrations:**

    ```bash
    php artisan migrate
    ```

6. **Set up authentication:**

    Install Laravel Breeze or Jetstream for authentication:

    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    npm install && npm run dev
    php artisan migrate
    ```

7. **Serve the application:**

    ```bash
    php artisan serve
    ```

## Database Schema

The project uses the following entities:

- **Users**
- **Courses**
- **Lessons**
- **Enrollments**

### Migrations

Run the migrations to create the necessary tables:

```bash
php artisan migrate
```

### Relationships

* Each **Course** has a title, description, and a relationship with **Lessons**.
* Each **Lesson** has a title, content, and belongs to a **Course**.
* **Enrollments** track which **Users** are enrolled in which **Courses**.

## Basic Functionality

### CRUD Operations

Implement CRUD operations for **Courses** and **Lessons**.

### User Enrollments

* Allow authenticated users to enroll in courses.
* Display a list of courses a user is enrolled in.
* Display a list of lessons for a course.

## Additional Features

### Role-Based Access Control

* Only authenticated users can enroll in courses.
* Only admin users can create, update, or delete courses and lessons.

### Search Functionality

* Implement a search functionality to find courses by title or description.

## Frontend

* Use Blade templates to create a simple and clean UI for the above functionalities.
* Ensure the UI is responsive and user-friendly.

## Testing

### Feature Tests

Write feature tests to cover the main functionalities, such as:

* Course creation
* User enrollment

Run tests with:

```bash
php artisan test
```

## Important Environment Variables

Here are the important environment variables used in the provided `.env` file:

```dotenv
APP_NAME=Learn
APP_ENV=local
APP_KEY=base64:q1UkqFhGXrJQIf/0DgnjtBdxIsSGRVbYbI70uI1tIH8=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=learningSystem
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
MAIL_MAILER=log
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Contribution

We welcome contributions to this project! If you'd like to contribute, please fork the repository and use a feature branch. Pull requests are warmly welcome.

1. Fork the repository
2. Create a new feature branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Create a new Pull Request

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.


