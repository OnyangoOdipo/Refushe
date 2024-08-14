<?php
session_start();

// Destroy the session data
$_SESSION = array(); // Clear the session variables

// If you want to delete the session cookie, use the following code
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session
session_destroy();

// Redirect to login page
header("Location: ../Home/Login.html"); // Update the path as needed
exit();
?>
