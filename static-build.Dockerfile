FROM --platform=linux/amd64 dunglas/frankenphp:static-builder

# Prepare the app
WORKDIR /go/src/app/dist/app
COPY . .
RUN echo APP_ENV=prod > .env.local ; \
    echo APP_DEBUG=0 >> .env.local ; \
    composer install --ignore-platform-reqs --no-dev -a ; \
    composer dump-env prod

# Build the static binary
WORKDIR /go/src/app/
RUN EMBED=dist/app/ \
    PHP_EXTENSIONS=ctype,iconv,pdo_sqlite \
    ./build-static.sh
