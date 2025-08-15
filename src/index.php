<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP & MySQL Docker Stack</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; color: #333; text-align: center; margin-top: 50px; }
        .container { background: white; padding: 2em; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: inline-block; }
        .status { font-size: 1.2em; padding: 10px; border-radius: 5px; color: white; }
        .success { background-color: #28a745; }
        .error { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP, MySQL & Portainer Stack</h1>
        <p>ทดสอบการเชื่อมต่อฐานข้อมูล MySQL:</p>
        <?php
            // ดึงค่าจาก Environment Variables ที่เราตั้งใน docker-compose
            $host = getenv('MYSQL_HOST');
            $user = getenv('MYSQL_USER');
            $pass = getenv('MYSQL_PASSWORD');
            $db_name = getenv('MYSQL_DATABASE');

            // ลองเชื่อมต่อฐานข้อมูล
            $conn = new mysqli($host, $user, $pass, $db_name);

            // ตรวจสอบการเชื่อมต่อ
            if ($conn->connect_error) {
                echo "<div class='status error'>การเชื่อมต่อล้มเหลว: " . $conn->connect_error . "</div>";
            } else {
                echo "<div class='status success'>เชื่อมต่อฐานข้อมูลสำเร็จ! 🎉</div>";
                $conn->close();
            }
        ?>
    </div>
</body>
</html>