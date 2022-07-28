# Training for FullSpeed Tech
Using Laravel 9 and PHP 8.1. With the use of Docker of Laravel (Sail).
https://laravel.com/docs/9.x/installation

## Highlights
1. Interface
2. Enumerations
3. Implementations (Repository)
4. Bootstrap CSS Framework
5. Soft-Delete and Pruning

## Known Issues:
1. storage log permission
```
rm bootstrap/cache/config.php
php artisan cache:clear

// Optionals:
composer dump-autoload
composer install
```

2. Permission denied after config:cache
```
php artisan optimize:clear
```

3. Unable to connect database
```
// Get DB Host
docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' training-app-mysql-1

// .env
DB_HOST=172.19.0.6

// [mysql] as root
ALTER USER 'sail' IDENTIFIED WITH mysql_native_password BY 'password';
```
