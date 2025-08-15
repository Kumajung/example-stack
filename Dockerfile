# Dockerfile

# ใช้ PHP เวอร์ชั่น 8.2 ที่มาพร้อมกับ Apache web server
FROM php:8.2-apache

# ติดตั้ง extensions ที่จำเป็นสำหรับการเชื่อมต่อ MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli