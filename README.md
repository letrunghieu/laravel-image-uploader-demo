# Laravel Image Uploader (demo)

## Run locally

1. Create .env file

     `cp .env.example .env`
    
2. Install PHP dependencies

     `composer install`
    
3. Generate application key
    
     `php artisan key:generate`
    
4. Update database connection information in the `.env` file.

5. Migrate database

     `php artisan migrate`
    
    
6. Init the `uploads` folder

     `php artisan storage:link`
    
    
7. Start the server

     `php artisan serve`

    
