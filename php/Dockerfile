FROM php:8.2-apache

# Install extensions commonly needed
RUN docker-php-ext-install pdo_mysql mysqli

# Enable Apache modules
RUN a2enmod rewrite headers

# Set DocumentRoot to /var/www/html/public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf

# Copy a basic php.ini (optional overrides)
COPY php.ini /usr/local/etc/php/conf.d/app.ini

# Healthcheck (simple)
HEALTHCHECK --interval=30s --timeout=3s --start-period=20s --retries=3 \
  CMD curl -fsS http://localhost/health || exit 1
