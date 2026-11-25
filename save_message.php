<?php
header('Content-Type: application/json');

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
  echo json_encode(['ok' => false, 'reply' => 'Please fill in all the fields.']);
  exit;
}

require 'db.php';
$stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->execute([$name, $email, $message]);

echo json_encode(['ok' => true, 'reply' => "Thank you, $name! Your message was saved."]);
