# FrankenPHP Demo

A demo app using [FrankenPHP](https://frankenphp.dev) that uses
Symfony and API Platform.

## Installation

### Composer

Install composer dependencies:

```
docker run --rm -it -v $PWD:/app composer:latest install
```

Or if you have composer installed locally:

```
composer install
```

### The project

Run the project with Docker (worker mode):

```
docker run \
    -e FRANKENPHP_CONFIG="worker ./public/index.php" \
    -v $PWD:/app \
    -p 80:80 -p 443:443 \
    dunglas/frankenphp
```

**PS**: Docker is optional; you can also compile
[FrankenPHP](https://github.com/dunglas/frankenphp/blob/main/docs/compile.md)
by yourself.


Create the database (It uses a local SQLite database stored in `var/data.db`):

```
bin/console doctrine:migrations:migrate --no-interaction
```

Then you can access the application:

* [Hello world page](https://localhost)
* [API Platform](https://localhost/api)
* [API Platform: collection of monsters (GET/JSON-LD)](https://localhost/api/monsters.jsonld)

This demo is a standard Symfony application and works without FrankenPHP.
Therefore, you can serve it with the Symfony CLI:

```
symfony serve
```

The repository also includes [a benchmark](benchmark) comparing FrankenPHP and PHP-FPM.
