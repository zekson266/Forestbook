FROM php:8.1-fpm as php

RUN apt-get update -y
RUN apt-get install -y libxml2-dev \
    libcurl4-openssl-dev
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install xml pdo pdo_mysql bcmath curl

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis xml

RUN usermod -u 1000 www-data

FROM nginx:alpine

# # Install composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Copy composer.lock and composer.json
# COPY composer.lock composer.json /app/

# # Set working directory
# WORKDIR /app

# # Install dependencies 
# RUN composer install --no-interaction --no-progress --prefer-dist

# # Copy rest of application
# COPY . /app

# # Expose ports and start FPM  
# EXPOSE 9000
# CMD ["php-fpm"]