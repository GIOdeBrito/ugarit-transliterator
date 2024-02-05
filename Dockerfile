# Use the official PHP 8.1 image with Apache
FROM php:8.1-apache

# Install SQLite3 extension
# Update: sqlite3 is already included in image
# RUN docker-php-ext-install pdo_sqlite

# Copy the local files to the apache html folder
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

