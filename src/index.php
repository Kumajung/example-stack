<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Docker Stack</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; color: #333; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; }
        .status { padding: 10px; border-radius: 4px; font-weight: bold; }
        .success { background-color: #e8f5e9; color: #2e7d32; }
        .error { background-color: #ffebee; color: #c62828; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 PHP Project on Portainer</h1>
        <p>PHP Version: <?php echo phpversion(); ?></p>
        <hr>
        <h3>Database Connection Status:</h3>
        <?php
            // ดึงค่า Environment Variables ที่ส่งมาจาก docker-compose.yml
            $host = getenv('MYSQL_HOST');
            $dbname = getenv('MYSQL_DATABASE');
            $user = getenv('MYSQL_USER');
            $pass = getenv('MYSQL_PASSWORD');

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                // ตั้งค่า PDO error mode เป็น exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<p class='status success'>✅ Connected to database (<b>$dbname</b>) successfully!</p>";
            } catch(PDOException $e) {
                echo "<p class='status error'>❌ Connection failed: " . $e->getMessage() . "</p>";
            }
        ?>
    </div>
</body>
</html>