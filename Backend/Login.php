<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    $email = $conn->real_escape_string($_POST['Email']);
    $password = $_POST['Password'];

    $sql = "SELECT id, password_hash FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $email;

            header("Location: dashboard.php");
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
