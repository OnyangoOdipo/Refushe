<?php
session_start();

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/db.php";

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    $_SESSION['error'] = "Token not found.";
    header("Location: reset-password.php?token=" . htmlspecialchars($token));
    exit;
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    $_SESSION['error'] = "Token has expired.";
    header("Location: reset-password.php?token=" . htmlspecialchars($token));
    exit;
}

if (strlen($_POST["password"]) < 8) {
    $_SESSION['error'] = "Password must be at least 8 characters.";
    header("Location: reset-password.php?token=" . htmlspecialchars($token));
    exit;
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    $_SESSION['error'] = "Password must contain at least one letter.";
    header("Location: reset-password.php?token=" . htmlspecialchars($token));
    exit;
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    $_SESSION['error'] = "Password must contain at least one number.";
    header("Location: reset-password.php?token=" . htmlspecialchars($token));
    exit;
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $_SESSION['error'] = "Passwords must match.";
    header("Location: reset-password.php?token=" . htmlspecialchars($token));
    exit;
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE users SET password_hash = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ss", $password_hash, $user["id"]);

$stmt->execute();

$_SESSION['success'] = "Password updated successfully. You can now log in.";
header("Location: ../Home/Login.html");
exit;
?>