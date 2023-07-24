
# Blog Management System

The Blog Management System is a simple web application built with Laravel that allows users to register, login, and manage their own blog posts. Authenticated users can create, read, update, and delete their blog posts, while all visitors can view published blog posts.

## Requirements

- PHP 7.4 or higher
- Composer
- MySQL or any other compatible database
- Node.js and npm (for frontend assets)

## Installation

1. Clone the repository or download the source code:

```bash
git clone https://github.com/your-username/blog-management-system.git
```

2. Navigate to the project directory:

```bash
cd blog-management-system
```

3. Install the required PHP dependencies using Composer:

```bash
composer install
```

4. Install the required frontend dependencies using npm:

```bash
npm install
```

5. Create a `.env` file by copying the `.env.example` file:

```bash
cp .env.example .env
```

6. Generate the application key:

```bash
php artisan key:generate
```

7. Set up your database configuration in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=your_database_host
DB_PORT=your_database_port
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

8. Run the database migrations and seed the initial data:

```bash
php artisan migrate --seed
```

9. Compile frontend assets (CSS and JS):

```bash
npm run dev
```

10. Serve the application:

```bash
php artisan serve
```

The application should now be accessible at `http://localhost:8000`.

## Usage

1. Register a new account or login with your existing credentials.
2. Upon login, you will be redirected to the dashboard where you can see your existing blog posts.
3. To create a new blog post, click on the "Create Post" button and fill in the required details.
4. To edit or delete a blog post, click on the "Edit" or "Delete" buttons next to each post on the dashboard.
5. All visitors can view the published blog posts without authentication.

## Features

- User registration and login with authentication.
- Create, read, update, and delete blog posts.
- Middleware to ensure that users can only modify their own blog posts.
- Utilizes Blade templates for a clean and user-friendly interface.
- Eloquent ORM to manage database operations and relationships.
- Form validation to ensure valid and complete data submission.
- Basic unit testing for critical components.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
