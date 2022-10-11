# FrankenPHP Demo

A demo app using [FrankenPHP](https://frankenphp.dev) that uses
Symfony and API Platform.

Run the project (worker mode):

```
docker run \
    -e FRANKENPHP_CONFIG="worker ./public/index.php" \
    -v $PWD:/app \
    -p 80:80 -p 443:443 \
    dunglas/frankenphp
```

The repository also includes [a benchmark](benchmark/) comparing FrankenPHP and PHP-FPM.
