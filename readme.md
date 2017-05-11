## Event Site Setup

- composer install
- copy .env.example to .env and make value changes as appropriate
- php artisan migrate:refresh --seed
- php artisan storage:link
- php artisan admin:create email name password