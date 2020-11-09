FROM php:7.3

RUN apt-get update && apt-get install -y \
    openssl \
    git \
    unzip \
    zlib1g-dev \
    libzip-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install zip

WORKDIR /usr/src/app
COPY . /usr/src/app

RUN PATH=$PATH:/usr/src/apps/vendor/bin:bin
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install
RUN ./bin/phpunit

ENTRYPOINT ["php", "bin/console" ,"app:serve"]