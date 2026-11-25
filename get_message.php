<?php
header('Content-Type: application/json');
require 'db.php';

$stmt = $pdo->query(
  "SELECT name, message, DATE_FORMAT(created_at, '%b %e, %h:%i %p') AS time
   FROM messages ORDER BY id DESC"
);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
