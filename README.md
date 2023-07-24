
# Blog Management System

The Blog Management System is a simple web application built with Laravel that allows users to register, login, and manage their own blog posts. Authenticated users can create, read, update, and delete their blog posts, while all visitors can view published blog posts.

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL or any other compatible database
- Node.js and npm (for frontend assets)

## Installation

1. Clone the repository or download the source code:

```bash
git clone https://github.com/swapins/laravelblog.git
```

2. Navigate to the project directory:

```bash
cd laravelblog
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

## Assignment Requirements:

### Database Design & Migrations:

Database schema which includes two tables: `Users` and `Posts`.
- The `Users` table include details like id, name, email, and password.
- The `Posts` table contain details like id, user_id (foreign key), title, content, and timestamps.
- /database/migrations - contain relavent files.
Laravel migrations can be used to generate these tables in your database.

### Data Seeding:
- seeder and factory files to populate the `Users` and `Posts` table with some initial data.
- database/factories/PostFactory.php
- database/factories/UserFactory.php
- database/seeders/BlogPostSeeder.php
    Create 25 random blog posts for each users
- database/seeders/UserSeeder.php
    Create 10 random users (password : password123) and one user named admin 
      Email : admin@admin.com, password : admin123

   
```bash
php artisan db:seed
php artisan db:seed --class=UserSeeder
```

### Authentication:
- Basic authentication system where users can register, login, and logout. 
- Only authenticated users should be able to write, edit, and delete their blog posts.

## Tests

- Conduct basic unit tests to validate the key components of the application.

```bash
php artisan test
```

```bash
PASS  Tests\Feature\Auth\AuthenticationTest
  ✓ login screen can be rendered                                                                              3.44s  
  ✓ users can authenticate using the login screen                                                             1.03s  
  ✓ users can not authenticate with invalid password                                                          0.32s  

   PASS  Tests\Feature\Auth\EmailVerificationTest
  ✓ email verification screen can be rendered                                                                 0.32s  
  ✓ email can be verified                                                                                     0.15s  
  ✓ email is not verified with invalid hash                                                                   0.16s  

   PASS  Tests\Feature\Auth\PasswordConfirmationTest
  ✓ confirm password screen can be rendered                                                                   0.07s  
  ✓ password can be confirmed                                                                                 0.09s  
  ✓ password is not confirmed with invalid password                                                           0.22s  

   PASS  Tests\Feature\Auth\PasswordResetTest
  ✓ reset password link screen can be rendered                                                                0.06s  
  ✓ reset password link can be requested                                                                      0.30s  
  ✓ reset password screen can be rendered                                                                     0.09s  
  ✓ password can be reset with valid token                                                                    0.09s  

   PASS  Tests\Feature\Auth\PasswordUpdateTest
  ✓ password can be updated                                                                                   0.25s  
  ✓ correct password must be provided to update password                                                      0.12s  

   PASS  Tests\Feature\Auth\RegistrationTest
  ✓ registration screen can be rendered                                                                       0.07s  
  ✓ new users can register                                                                                    0.04s  

   PASS  Tests\Feature\Post\PostTest
  ✓ environment configuration                                                                                 0.02s  
  ✓ user can create post                                                                                      0.05s  
  ✓ user can update post                                                                                      0.03s  
  ✓ user can delete post                                                                                      0.03s  
  ✓ non auth user cannot create post                                                                          0.04s  
  ✓ non auth user cannot edit post                                                                            0.03s  
  ✓ non auth user cannot delete post                                                                          0.02s  
  ✓ guest user can visit all posts                                                                            0.11s  
```

## Assumptions
Random Pictures are used for visual appel as placeholder which is hardcoded.
Random Avatrs are used for profile.
Dummy text used.

Mail server need to be configure to send / test verification email / forget password

### Mail 
in ENV
```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="admin@laravelblog.com"
MAIL_FROM_NAME="${APP_NAME}"
```


## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.
contact : swapin@laravelone.in

## License

This project is licensed under the [MIT License](LICENSE).
