# Use the official PHP 8.1 image with Apache
FROM php:8.1-apache

COPY . /var/www/html/

# Copy custom apache2 configuration file
COPY apache2/apache2.conf /etc/apache2/

# Copy virtual host file for available sites
COPY apache2/000-default.conf /etc/apache2/sites-available

# Enables the rewrite module for .htaccess
RUN a2enmod rewrite

# Destroys the copied apache2 folder and dockerignore file
RUN rm -rf apache2/
RUN rm .dockerignore

# Expose port 80
EXPOSE 80