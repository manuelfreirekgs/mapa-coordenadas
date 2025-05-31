FROM php:8.2-apache

# Instala extensiones necesarias para PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia tu app al directorio web de Apache
COPY . /var/www/html/

# (Opcional) habilita mod_rewrite si usarás URLs limpias
RUN a2enmod rewrite
