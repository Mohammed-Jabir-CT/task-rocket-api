# Laravel Project Setup Guide


## Requirements

- PHP >= 8.0  
- Composer  
- MySQL or any compatible database  

## Installation Steps

1. **Clone the Repository**  
   ```bash
   git clone <repository-url>
   cd <project-folder>
   ```

2. **Copy Environment File**  
   ```bash
   cp .env.example .env
   ```

3. **Configure Database in `.env`**  
   Open the `.env` file and update the following lines with your database credentials:
   ```env
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

4. **Install Dependencies**  
   ```bash
   composer install
   ```

5. **Run Migrations**  
   ```bash
   php artisan migrate
   ```

6. **Seed the Database**  
   This will create a default user and associated tasks.
   ```bash
   php artisan db:seed
   ```

7. **Start the Development Server**  
   ```bash
   php artisan serve
   ```
   The application will be available at: [http://localhost:8000](http://localhost:8000)

## Default Login Credentials

- **Email:** test@example.com  
- **Password:** password
