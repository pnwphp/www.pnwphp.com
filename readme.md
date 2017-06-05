# Pacific Northwest PHP Conference

This website is available at [pnwphp.com](http://pnwphp.com)
The staging version is available at [staging.pnwphp.com](http://staging.pnwphp.com)

**Join us in Seattle for the Pacific Northwest PHP developer conference.**

Our 3-day event will be overflowing with fantastic content as we hear from
world-renowned speakers from the PHP community. With topics ranging from APIs
to unit testing, you will be full to the brim with new knowledge to take home.

## GitHub Repo

This [GitHub Repo](https://github.com/pnwphp/www.pnwphp.com) is the code base
for the [PNWPHP conference website ](http://pnwphp.com/)

## Laravel PHP Framework

This is a fork of an event site repo from SeaPHPer [mstaples](http://github.com/mstaples) using the [Laravel](http://laravel.com/docs) Framework.
Laravel is a modern PHP framework for building web applications with
expressive, elegant syntax. We believe development must be an enjoyable,
creative experience to be truly fulfilling.  Laravel attempts to take the pain
out of development by easing common tasks used in the majority of web projects,
such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the 
[Laravel website](https://laravel.com/docs).

## Site Setup 
This is only needed on a new install (for your local development environment, for example) - the staging and production sites are automatically deployed using a Jenkins CI setup.

Because the repo uses the Laravel framework, a local development environment can be setup in a relatively straight forward manner by using Laravel's [Homestead vagrant box](https://laravel.com/docs/5.4/homestead).

Once your environment is setup, including installing composer (and other dependencies if not using the Homestead pre packaged vagrant box), and this repo is cloned into the desired development location: 
- mkdir storage/framework/sessions storage/framework/views storage/framework/cache
- composer install
- sudo chmod -R 777 storage/
- copy .env.example to .env and make value changes as appropriate
- php artisan key:generate
- php artisan migrate:refresh --seed
- php artisan storage:link
- php artisan admin:create email name password

Please make your PRs against the staging branch.

Thank you!