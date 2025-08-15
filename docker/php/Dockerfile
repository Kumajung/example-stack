# ใช้ Official PHP image ที่มี Apache ติดตั้งมาให้
FROM php:8.2-apache

# ติดตั้ง PHP extensions ที่จำเป็น
# ในที่นี้เราต้องการ pdo_mysql เพื่อเชื่อมต่อกับ MySQL
RUN docker-php-ext-install pdo_mysql

# คัดลอกซอร์สโค้ดของเราเข้าไปใน public directory ของ Apache
COPY ../../src/ /var/www/html/

# เปิด Port 80
EXPOSE 80