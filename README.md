# Expensio

##  Overview

Expensio is a personal expense and budget management web application built with Laravel and MySQL.

The application allows authenticated users to record and manage their expenses, organize expenses into categories, set monthly budgets, and monitor their spending through a centralized dashboard.

The project focuses on implementing secure user-specific data management, authorization, filtering, pagination, and database-driven business logic using Laravel.

---

##  Key Features

- User registration and authentication
- User-specific expense management
- Create, update, view, and delete expenses
- Expense categorization
- Create and manage expense categories
- Search and filter expenses
- Filter expenses by:
  - Category
  - Date range
  - Month
  - Year
- Paginated expense listings
- Monthly budget management
- Monthly spending tracking
- Remaining budget calculation
- Dashboard with expense summaries
- Category-wise expense analysis
- User-specific data access
- Authorization using Laravel Policies
- Database-level constraints for business rules

---

##  Expense Management

Users can manage their personal expenses through a dedicated expense management module.

Each expense can be associated with a category and contains relevant information such as the expense name, amount, and date.

### Expense functionality

- Add an expense
- View expense details
- Edit an expense
- Delete an expense
- Assign an expense to a category
- View expenses in a paginated list
- Search expenses
- Filter expenses by category and date

All expense data is scoped to the authenticated user.

---

##  Category Management

Expensio allows users to organize their expenses using custom categories.

### Category functionality

- Create categories
- View categories
- Edit categories
- Delete categories
- Associate expenses with categories
- Prevent duplicate category names for the same user

Categories are user-specific, ensuring that one user cannot access or manage another user's categories.

---

##  Expense Filtering & Pagination

The expense listing supports multiple filters to help users find specific transactions efficiently.

Users can filter expenses by:

- Expense name/search term
- Category
- Date range
- Month
- Year

Pagination is implemented for expense listings, while maintaining the selected query parameters when navigating between pages.

---

##  Budget Management

Expensio provides monthly budget management to help users monitor their spending against a defined budget.

### Budget functionality

- Create a monthly budget
- Prevent duplicate budgets for the same user and month
- View the current month's budget
- Calculate total spending for the month
- Calculate remaining budget
- Edit the current month's budget
- Delete the current month's budget

A database-level unique constraint is used to ensure that a user cannot create multiple budgets for the same month and year.

---

## 📊 Dashboard

The dashboard provides an overview of the user's financial activity.

It includes information such as:

- Total expenses
- Current month's spending
- Number of expenses
- Current monthly budget
- Remaining budget
- Recent expenses
- Category-wise spending

The dashboard uses related expense and category data to present a summarized view of the user's spending.

---

##  Authentication & Authorization

Expensio uses Laravel's authentication and authorization features to protect user data.

Each user's expenses, categories, and budgets are associated with their account.

Laravel Policies are used to ensure that users can only perform authorized actions on their own resources.

For example:

User A
 ├── Expenses
 ├── Categories
 └── Budget

User B
 ├── Expenses
 ├── Categories
 └── Budget

User A cannot access or modify User B's resources.

This provides an additional authorization layer beyond simply checking whether a user is authenticated.

---

##  Database Design

Expensio uses **MySQL** as its relational database.

The application contains relationships between entities such as:

- Users
- Categories
- Expenses
- Budgets

### Database relationships

User
 │
 ├────────── Categories
 │                │
 │                └── Expenses
 │
 ├────────── Expenses
 │
 └────────── Budget

### Entity Relationship Diagram

---

##  Laravel Concepts Used

The project demonstrates several Laravel concepts, including:

- MVC architecture
- Routing
- Controllers
- Blade templates
- Eloquent ORM
- Eloquent relationships
- Migrations
- Form validation
- Form Requests
- Authentication
- Authorization
- Laravel Policies
- Middleware
- Route model binding
- CRUD operations
- Query Builder / Eloquent queries
- Pagination
- Query string preservation
- Database constraints
- Environment configuration

---

##  Screenshots

### Dashboard

### Expense List

### Add Expense

### Expense Filters

### Category Management

### Budget Management

---

##  Installation

### Prerequisites

Make sure the following are installed:

- PHP
- Composer
- MySQL
- Node.js & npm
- Laravel-compatible PHP extensions
- XAMPP / Laragon or another local PHP development environment

### 1. Clone the repository

git clone https://github.com/dishapatel1412/Expensio.git
cd Expensio

### 2. Install PHP dependencies

composer install

### 3. Install frontend dependencies

npm install

### 4. Create the environment file

cp .env.example .env

### 5. Generate the application key

php artisan key:generate

### 6. Configure the database

Create a MySQL database and update the following values in `.env`:

DB_DATABASE=expensio
DB_USERNAME=root
DB_PASSWORD=

### 7. Run migrations

php artisan migrate

If the project contains seeders:

php artisan migrate --seed

### 8. Build frontend assets

For development:

npm run dev

### 9. Start the Laravel development server

php artisan serve

The application will be available at:

http://127.0.0.1:8000

---

##  Future Improvements

Potential improvements for future versions include:

- Expense analytics and visualizations
- Recurring expenses
- Recurring budgets
- Export expenses to CSV/PDF
- Email notifications
- Advanced financial reports
- Expense import from external sources
- REST API
- Mobile application
- AI-powered expense categorization
- Spending prediction and financial insights

---

##  Tech Stack

### Backend

- PHP
- Laravel

### Frontend

- Blade
- HTML
- CSS
- JavaScript
- Tailwind CSS

### Database

- MySQL

### Development Tools

- Composer
- npm
- Git
- GitHub
- Laragon

---

##  Author

**Disha Patel**

GitHub: [dishapatel1412](https://github.com/dishapatel1412)