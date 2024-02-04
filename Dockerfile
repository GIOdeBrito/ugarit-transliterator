# Use the official PHP 8.1 image with Apache
FROM php:8.1-apache

# Install additional PHP extensions or dependencies as needed
# For example, if you need MySQL support:
# RUN docker-php-ext-install mysqli pdo_mysql

# Copy the local files to the apache html folder
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

