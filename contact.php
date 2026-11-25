} else {
  require 'db.php';
  $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
  $stmt->execute([$name, $email, $message]);
  $reply = "Thank you, " . htmlspecialchars($name) . "! Your message was saved.";
}
