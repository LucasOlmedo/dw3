FROM php:8.2-fpm

WORKDIR /var/www/html

# Instale as dependências necessárias
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    nginx \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libbz2-dev \
    libzip-dev \
    libssl-dev \
    libmcrypt-dev \
    && docker-php-ext-install pdo_mysql mysqli

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Crie os diretórios storage e bootstrap/cache e defina as permissões
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
