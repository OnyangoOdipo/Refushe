<?php
session_start();

$response = array();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $response['logged_in'] = true;
} else {
    $response['logged_in'] = false;
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
