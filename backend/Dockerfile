FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git curl zip unzip libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www

COPY . .

RUN mkdir -p bootstrap/cache storage/logs storage/framework/cache \
    storage/framework/sessions storage/framework/views \
    && chmod -R 775 bootstrap/cache storage

RUN composer install --no-dev --optimize-autoloader

RUN echo "APP_ENV=production" > .env && \
    echo "APP_KEY=base64:fNaT9WJnrWGM5k2fsdr3b7lZKp6/GUxwLlquCoMtipg=" >> .env && \
    echo "APP_DEBUG=false" >> .env && \
    echo "DB_CONNECTION=sqlite" >> .env && \
    echo "DB_DATABASE=/tmp/liga.sqlite" >> .env && \
    echo "ADMIN_TOKEN=secreto-admin-123" >> .env && \
    echo "SESSION_DRIVER=array" >> .env && \
    echo "CACHE_STORE=array" >> .env && \
    echo "QUEUE_CONNECTION=sync" >> .env

RUN php artisan config:cache && \
    php artisan route:cache

EXPOSE 8000

CMD php artisan migrate --force && php artisan serve --host 0.0.0.0 --port ${PORT:-8000}