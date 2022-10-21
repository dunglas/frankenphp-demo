# FrankenPHP Demo

A demo app using [FrankenPHP](https://frankenphp.dev) that uses
Symfony and API Platform.

## Prerequisite

* docker
* PHP 8.2

## Installation

### Composer

Install composer dependencies:

```
docker run --rm -it -v $PWD:/app composer:latest install --ignore-platform-req=php
```

Or if you have composer installed locally:

```
composer install --ignore-platform-req=php
```

### The project

Run the project (worker mode):

```
docker run \
    -e FRANKENPHP_CONFIG="worker ./public/index.php" \
    -v $PWD:/app \
    -p 80:80 -p 443:443 \
    dunglas/frankenphp
```

Build the database (it uses a local SQLite database stored in `var/data.db`):

```
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate --no-interaction
```

Insert some data (or use the [API Platform](https://localhost/api/monsters) swagger interface):

```
bin/console doctrine:query:sql "INSERT into monster (name) values ('FrankenPHP 🐘')"
```

Then you can access the application:

* [Hello world page](https://localhost)
* [API Platform](https://localhost/api)
* [API Platform: collection of monsters (GET/jsonld)](https://localhost/api/monsters.jsonld)

The repository also includes [a benchmark](benchmark) comparing FrankenPHP and PHP-FPM.
