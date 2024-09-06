FROM php:8.3.9-fpm

RUN apt update && apt install -y \
   libmcrypt-dev \
   libzip-dev \
   libpq-dev \
   npm \
   libmagickwand-dev \
   && docker-php-ext-install pdo pdo_pgsql

RUN docker-php-ext-install zip

COPY . .

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer install

RUN npm install

RUN npm run build

WORKDIR /app
