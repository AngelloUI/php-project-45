FROM php:8.4-cli

RUN docker-php-ext-install pdo_mysql

WORKDIR /app

COPY . /app

RUN apt-get update && apt-get install -y git unzip
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer install

CMD ["php", "bin/brain-main"]
