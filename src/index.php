<?php
// src/index.php

// ข้อมูลสำหรับเชื่อมต่อฐานข้อมูล
// **สำคัญ:** host คือชื่อ service ของ database ใน docker-compose.yml
$host = 'db';
$user = 'user'; // ตรงกับ MYSQL_USER ใน docker-compose.yml
$pass = 'password'; // ตรงกับ MYSQL_PASSWORD ใน docker-compose.yml
$db_name = 'my_php_app_db'; // ตรงกับ MYSQL_DATABASE ใน docker-compose.yml

// สร้างการเชื่อมต่อ
$conn = new mysqli($host, $user, $pass, $db_name);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("<h1>Connection failed: " . $conn->connect_error . "</h1>");
}

echo "<h1>🚀 Connected to MySQL Successfully!</h1>";
echo "<p>Connected to database: <strong>" . $db_name . "</strong></p>";
echo "<p>PHP version: " . phpversion() . "</p>";

// ปิดการเชื่อมต่อ
$conn->close();

?>