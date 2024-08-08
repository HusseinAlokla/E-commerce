# Use the official PHP image with Apache
FROM php:7.4-apache

# Copy the application code to the Apache web root
COPY . /var/www/html/

# Install necessary PHP extensions, e.g., mysqli
RUN docker-php-ext-install mysqli

# Expose port 80
EXPOSE 80
