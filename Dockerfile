FROM webdevops/php-apache:8.2

# Copiar archivos del proyecto
COPY . /app

WORKDIR /app

# Instalar Composer
RUN apk update && apk add --no-cache git unzip
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Corrección del puerto dinámico
RUN echo "Listen ${PORT}" > /opt/docker/etc/httpd/vhost.conf

EXPOSE 80


