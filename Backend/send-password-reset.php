<?php

$email = $_POST["email"];

// Generate a token
$token = bin2hex(random_bytes(16));

// Hash the token
$token_hash = hash("sha256", $token);

// Set the token expiry time (30 minutes from now)
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

// Include the database connection
$conn = require __DIR__ . "/db.php";

// SQL query to update the user's reset token
$sql = "UPDATE users
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameters and execute
$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

// Check if the update was successful
if ($conn->affected_rows) {

    // Include the mailer
    $mail = require __DIR__ . "/mailer.php";

    // Set up the email
    $mail->setFrom("attachopap@gmail.com");
$mail->addAddress($email);
$mail->Subject = "Password Reset Request";

$mail->Body = <<<END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #ff5450;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header img {
            width: 150px;
        }
        .content {
            padding: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background: #ff5450;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .footer {
            font-size: 14px;
            color: #777;
            text-align: center;
            padding: 10px;
        }
        .footer a {
            color: #ff5450;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="../Home/logo.png" alt="RefuSHE Logo">
            <h1>Password Reset Request</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>We received a request to reset your password. To proceed, please click the button below to create a new password:</p>
            <a href="http://localhost/Refushe/Backend/reset-password.php?token=$token" class="button">Reset Your Password</a>
            <p>If you did not request a password reset, please ignore this email. Your password will not be changed.</p>
            <h3>Password Best Practices:</h3>
            <ul>
                <li>Use a mix of uppercase and lowercase letters, numbers, and symbols.</li>
                <li>Avoid using easily guessable information such as names or birthdays.</li>
                <li>Use a unique password for each of your accounts.</li>
                <li>Change your passwords regularly and avoid reusing old passwords.</li>
            </ul>
            <p>Thank you!</p>
            <p>The RefuSHE Team</p>
        </div>
        <div class="footer">
            <p>If you have any questions, feel free to <a href="mailto:support@refushe.org">contact us</a>.</p>
        </div>
    </div>
</body>
</html>
END;


    // Attempt to send the email
    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }
}

echo "Message sent, please check your inbox.";
