<?php
/**
 * Simple PDO helper using environment variables injected by docker-compose.
 * 
 * Env vars:
 * - MYSQL_HOST
 * - MYSQL_DATABASE
 * - MYSQL_USER
 * - MYSQL_PASSWORD
 */
function db(): PDO {
  $host = getenv('MYSQL_HOST') ?: 'db';
  $dbname = getenv('MYSQL_DATABASE') ?: 'appdb';
  $user = getenv('MYSQL_USER') ?: 'appuser';
  $pass = getenv('MYSQL_PASSWORD') ?: 'changeme_pass';
  $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
  $opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];
  return new PDO($dsn, $user, $pass, $opt);
}
