<?php
// buttons.php

// Include database connection
include '../Backend/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['application_id']) && isset($_POST['action'])) {
        $applicationId = $_POST['application_id'];
        $action = $_POST['action'];

        // Determine the new status based on the action
        $newStatus = ($action === 'accept') ? 'Approved' : (($action === 'reject') ? 'Rejected' : null);

        if ($newStatus) {
            // Update the status in the database
            $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }
            
            $stmt->bind_param('si', $newStatus, $applicationId);

            if ($stmt->execute()) {
                // Success, redirect back to the application page
                header("Location:admin.php");
                exit();
            } else {
                // Error, output the error message
                die("Error updating record: " . htmlspecialchars($conn->error));
            }

            $stmt->close();
        } else {
            // Invalid action
            die("Invalid action");
        }
    } else {
        // Missing data
        die("Missing data");
    }

    $conn->close();
} else {
    // Invalid request method
    die("Invalid request method");
}
?>