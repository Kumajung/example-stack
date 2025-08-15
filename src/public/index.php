<?php
require_once __DIR__ . '/../shared/db.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP + MySQL on Portainer</title>
  <style>
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif; margin: 2rem; }
    code { background: #f5f5f7; padding: .2rem .4rem; border-radius: 4px; }
    .ok { color: #0a7d00; }
    .warn { color: #a65d00; }
    .error { color: #b00020; }
    .card { border: 1px solid #eee; padding: 1rem; border-radius: 12px; box-shadow: 0 1px 4px rgba(0,0,0,.06); max-width: 720px; }
    .grid { display: grid; gap: 1rem; }
    a { color: #0b5fff; text-decoration: none; }
  </style>
</head>
<body>
  <h1>✅ PHP + MySQL + phpMyAdmin on Portainer</h1>
  <div class="grid">
    <div class="card">
      <h3>Status</h3>
      <ul>
        <li>PHP: <span class="ok"><?php echo phpversion(); ?></span></li>
        <li>DB Host: <code><?php echo getenv('MYSQL_HOST') ?: 'db'; ?></code></li>
        <li>Database: <code><?php echo getenv('MYSQL_DATABASE') ?: 'appdb'; ?></code></li>
        <li>User: <code><?php echo getenv('MYSQL_USER') ?: 'appuser'; ?></code></li>
      </ul>
    </div>

    <div class="card">
      <h3>DB Test (fetch a row)</h3>
      <pre><?php
        try {
          $pdo = db();
          $stmt = $pdo->query('SELECT id, message, created_at FROM hello_messages ORDER BY id DESC LIMIT 5');
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
          echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } catch (Throwable $e) {
          echo 'DB error: ' . $e->getMessage();
        }
      ?></pre>
    </div>

    <div class="card">
      <h3>Useful links</h3>
      <ul>
        <li><a href="/info.php" target="_blank">phpinfo()</a></li>
        <li><a href="/health" target="_blank">Health check</a></li>
        <li><a href="http://localhost:8081" target="_blank">phpMyAdmin (default: port 8081)</a></li>
      </ul>
    </div>
  </div>
</body>
</html>
