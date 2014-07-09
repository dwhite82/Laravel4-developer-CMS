Laravel4-developer-CMS
=================================
Author: Dan White

This is a developer-centered CMS that I have created using laravel 4.

It includes all of the necessary files to install and test it using a xampp stack, as well as some test database seed data.

## Installation
In order to install all the necessary dependencies run

```
composer install
```

Migrate the database tables

```
php artisan migrate
```

Seed the tables with some test data

```
php artisan db:seed
```

## Known Issues
This is my first run at creating a fully-functioning responsive CMS in Laravel, so there will be a few problems I will be working on resolving.

- The responsive navigation needs to be refractored to handle deeper site structures (view partials and jQuery).
- Pagination needs to be added to the admin views for excessive records as the site grows.
- The "Categories" need to be anchored to respective "Pages" in the admin area.

### Legal
Author & copyright (c) 2014: [Dan White](http://teddyray.net)