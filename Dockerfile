FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql

# Set public/ as the web root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Enable mod_rewrite for clean URLs later
RUN a2enmod rewrite