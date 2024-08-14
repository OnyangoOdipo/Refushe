<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    $email = $conn->real_escape_string($_POST['Email']);
    $password = $_POST['Password'];

    $sql = "SELECT id, password_hash, roles FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $row['roles'];

            // Make sure no output is sent before this
            if ($row['roles'] === 'admin') {
                header("Location: ../Admin/admin.php");
            } else {
                header("Location: ../Home.php");
            }
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email address!";
    }

    $conn->close();
}
?>
