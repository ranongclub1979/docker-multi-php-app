# docker-multi-php-app/project-a/php/Dockerfile

# ใช้ PHP Image พื้นฐานที่เราต้องการ
FROM php:8.2-fpm

# กำหนด Working Directory ภายในคอนเทนเนอร์
WORKDIR /var/www/html

# ติดตั้ง Dependencies ของระบบปฏิบัติการที่จำเป็นสำหรับ PHP Extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# ติดตั้ง PHP Extensions ที่โปรเจกต์ต้องการ (pdo_mysql จำเป็นถ้าใช้ MySQL)
RUN docker-php-ext-install pdo_mysql mysqli zip gd

# คัดลอกไฟล์ Composer เข้ามา (ถ้าโปรเจกต์ใช้)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# คัดลอกไฟล์ php.ini ที่ปรับแต่งเอง
COPY ./php.ini /usr/local/etc/php/conf.d/custom.ini

# สร้างโฟลเดอร์สำหรับ error log และตั้งสิทธิ์ (ตามที่กำหนดใน custom.ini)
RUN mkdir -p /var/log/php && \
    chown -R www-data:www-data /var/www/html /var/log/php

# เปิดเผยพอร์ตที่ PHP-FPM กำลังฟังอยู่
EXPOSE 9000
