# Imagen base PHP con Apache
FROM php:8.2-apache

# Instalar dependencias necesarias para MongoDB
RUN apt-get update && apt-get install -y \
    git unzip pkg-config libssl-dev

# Instalar Composer desde imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar extensión MongoDB para PHP
RUN pecl install mongodb \
    && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini

# Copiar el proyecto
COPY . /var/www/html/

# Ir a la carpeta del proyecto
WORKDIR /var/www/html

# Instalar dependencias del proyecto
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chown -R www-data:www-data /var/www/html

# Render/Railway asignan el puerto dinámico en $PORT
RUN echo "Listen \${PORT}" > /etc/apache2/ports.conf

# Exponer 80
EXPOSE 80

CMD ["apache2-foreground"]
