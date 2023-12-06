# FrankenPHP Demo

A demo app using [FrankenPHP](https://frankenphp.dev) that uses
Symfony and API Platform.

## Installation

### Composer

Install composer dependencies:

```console
docker run --rm -it -v $PWD:/app composer:latest install
```

Or if you have composer installed locally:

```console
composer install
```

### The project

Run the project with Docker (worker mode):

```console
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

```console
bin/console doctrine:migrations:migrate --no-interaction
```

Then you can access the application:

* [Hello world page](https://localhost)
* [API Platform](https://localhost/api)
* [API Platform: collection of monsters (GET/JSON-LD)](https://localhost/api/monsters.jsonld)

This demo is a standard Symfony application and works without FrankenPHP.
Therefore, you can serve it with the Symfony CLI:

```console
symfony serve
```

The repository also includes [a benchmark](benchmark) comparing FrankenPHP and PHP-FPM.


## Package as a Standalone Binary

The demo app can be packaged as a self-contained binary containing
the Symfony app, FrankenPHP and the PHP extensions used by the app.

To do so, the easiest way is to use the provided `Dockerfile`:

```console
docker build -t static-app -f static-build.Dockerfile .
docker cp $(docker create --name static-app-tmp static-app):/go/src/app/dist/frankenphp-linux-x86_64 frankenphp-demo ; docker rm static-app-tmp
```

The resulting binary is `frankenphp-demo` in the current directory.
It can be started with `./frankenphp-demo php-server`.

To reduce the size before distributing it, compress it with `xz`.
