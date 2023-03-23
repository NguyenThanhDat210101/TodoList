FROM php:latest

WORKDIR /app

COPY . /app

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install mysqli pdo_mysql

RUN curl -sSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "."]
