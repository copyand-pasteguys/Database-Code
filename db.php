<?php
$pdo = new PDO(
  "mysql:host=localhost;dbname=portfolio_db;charset=utf8mb4",
  "root",
  "",
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
$pdo->exec("SET time_zone = '+08:00'");
