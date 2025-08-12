
# Book Store App

## Langkah Instalasi dan Menjalankan Proyek

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini dengan benar:

1. **Clone repository dari GitHub**
   ```
   git clone https://github.com/ngurahwidi/laravel-bookstore-app.git

2. **Masuk ke folder project**
    ```
    cd repository

3. **Install dependencies dengan Composer**
    ```
    composer install

4. **Copy file environment**
    ```
    cp .env.example .env

5. **Atur konfigurasi database di file .env**
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database-name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

6. **Jalankan migrasi database**
    ```
    php artisan migrate

7. **Seed database dengan data awal**
    ```
    php artisan db:seed AuthorSeeder
    php artisan db:seed CategorySeeder
    php artisan db:seed BookSeeder
    php artisan db:seed RatingSeeder

8. **Jalankan server Laravel**
    ```
    php artisan serve

9. **Buka aplikasi**
    ```
    http://localhost:8000

