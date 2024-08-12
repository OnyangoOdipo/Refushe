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

    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (surname, other_names, email, id_document_name, id_document_number, password_hash) 
            VALUES ('$surname', '$other_names', '$email', '$id_document_name', '$id_document_number', '$password_hash')";

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
