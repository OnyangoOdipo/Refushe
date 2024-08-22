<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $conn->real_escape_string($_POST['SurName']);
    $other_names = $conn->real_escape_string($_POST['OtherNames']);
    $email = $conn->real_escape_string($_POST['Email']);
    $id_document_name = $conn->real_escape_string($_POST['IdDocumentName']);
    $id_document_number = $conn->real_escape_string($_POST['IdDocumentNumber']);
    $password = $_POST['Password'];
    $confirm_password = $_POST['ConfirmPassword'];
    $role = $conn->real_escape_string($_POST['UserRole']); // Get the user role

    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Validate role
    if (!in_array($role, ['user', 'admin'])) {
        die("Invalid role selected!");
    }

    $sql = "INSERT INTO users (surname, other_names, email, id_document_name, id_document_number, password_hash, roles) 
            VALUES ('$surname', '$other_names', '$email', '$id_document_name', '$id_document_number', '$password_hash', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: ../Home/login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
