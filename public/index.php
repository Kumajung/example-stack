<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP MySQL Docker Test</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; text-align: center; margin-top: 50px; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; display: inline-block; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .status { font-size: 20px; font-weight: bold; }
        .success { color: #28a745; }
        .error { color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP & MySQL Connection Status</h1>
        <?php
            // ตัวแปรเหล่านี้จะถูกอ่านมาจาก Environment Variables ใน docker-compose.yml
            $host = 'db'; // ชื่อ service ของ MySQL ใน docker-compose
            $dbname = getenv('MYSQL_DATABASE');
            $user = getenv('MYSQL_USER');
            $pass = getenv('MYSQL_PASSWORD');

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                // ตั้งค่าให้ PDO แสดง error
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<p class='status success'>✅ Connected to MySQL successfully!</p>";
            } catch(PDOException $e) {
                echo "<p class='status error'>❌ Connection failed: " . $e->getMessage() . "</p>";
            }
        ?>
    </div>
</body>
</html>