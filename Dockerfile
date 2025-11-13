# Gunakan image PHP resmi versi terbaru dengan Apache
FROM php:8.2-apache

# Set working directory di dalam container
WORKDIR /var/www/html

# Copy semua file project ke dalam container
COPY . /var/www/html/

# Aktifkan modul bawaan Apache dan PHP jika perlu
RUN docker-php-ext-install pdo pdo_mysql

# Buka port default untuk web server
EXPOSE 80

# Jalankan Apache saat container start
CMD ["apache2-foreground"]
