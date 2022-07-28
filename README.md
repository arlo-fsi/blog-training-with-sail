# Training for FullSpeed Tech
Using Laravel 9 and PHP 8.1. With the use of Docker of Laravel (Sail).
https://laravel.com/docs/9.x/installation

## Highlights
1. Interface
2. Enumerations
3. Implementations (Repository)
4. Bootstrap CSS Framework

## Known Issues:
1. storage log permission
```
rm bootstrap/cache/config.php
php artisan cache:clear

// Optionals:
composer dump-autoload
composer install
```
