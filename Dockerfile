FROM php:8.1-fpm

RUN apt update && apt install nginx -y

RUN docker-php-ext-install pdo pdo_mysql

RUN apt update && apt install -y unzip zip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

RUN cp .env.example .env

RUN php artisan key:generate

RUN composer install --optimize-autoloader --no-dev

RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 80

CMD service nginx start && php-fpm