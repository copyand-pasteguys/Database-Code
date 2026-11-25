<?php
header('Content-Type: application/json');
require 'db.php';

$id = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare(
    "INSERT INTO likes (project_id, total) VALUES (?, 1)
     ON DUPLICATE KEY UPDATE total = total + 1"
  );
  $stmt->execute([$id]);
}

$stmt = $pdo->prepare("SELECT total FROM likes WHERE project_id = ?");
$stmt->execute([$id]);
$count = (int) $stmt->fetchColumn();

echo json_encode(['id' => $id, 'likes' => $count]);
