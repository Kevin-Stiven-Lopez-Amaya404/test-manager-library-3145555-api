FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json ./
RUN composer install --no-interaction --prefer-dist --no-progress --no-scripts
FROM php:8.3-cli-alpine
RUN apk add --no-cache postgresql-dev $PHPIZE_DEPS \
    && docker-php-ext-install pdo_pgsql \
    && apk del $PHPIZE_DEPS
WORKDIR /app
COPY --from=vendor /app/vendor ./vendor
COPY . .
EXPOSE 8000
CMD ["sh","-c","php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8000"]
