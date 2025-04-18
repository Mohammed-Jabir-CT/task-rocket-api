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

2. **Copy Environment File From '.env.example' to '.env'**

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

5. **Generate App Encryption Key** 
   ```bash
   php artisan key:generate
   ```
   
6. **Run Migrations**  
   ```bash
   php artisan migrate
   ```

7. **Seed the Database**  
   This will create a default user and associated tasks.
   ```bash
   php artisan db:seed
   ```

8. **Start the Development Server**  
   ```bash
   php artisan serve
   ```
   The application will be available at: [http://localhost:8000](http://localhost:8000)

9. **Setup Frontend**
    
    Configure frontend: [https://github.com/Mohammed-Jabir-CT/task-rocket-view](https://github.com/Mohammed-Jabir-CT/task-rocket-view)
