## Event Site Setup

- mkdir storage/framework/sessions storage/framework/views storage/framework/cache
- composer install
- sudo chmod -R 777 storage/
- copy .env.example to .env and make value changes as appropriate
- php artisan key:generate
- php artisan migrate:refresh --seed
- php artisan storage:link
- php artisan admin:create email name password