<?php
// buttons.php

// Include database connection
include '../Backend/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['application_id']) && isset($_POST['action'])) {
        $applicationId = $_POST['application_id'];
        $action = $_POST['action'];

        // Determine the new status based on the action
        $newStatus = ($action === 'accept') ? 'Accepted' : (($action === 'reject') ? 'Rejected' : null);

        if ($newStatus) {
            // Update the status in the database
            $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
            $stmt->bind_param('si', $newStatus, $applicationId);

            if ($stmt->execute()) {
                // Success, redirect back to the application page
                header("Location: your_application_page.php?success=ApplicationUpdated");
            } else {
                // Error, redirect back with an error
                header("Location: your_application_page.php?error=DatabaseError");
            }

            $stmt->close();
        } else {
            // Invalid action
            header("Location: your_application_page.php?error=InvalidAction");
        }
    } else {
        // Missing data
        header("Location: your_application_page.php?error=MissingData");
    }

    $conn->close();
} else {
    // Invalid request method
    header("Location: your_application_page.php?error=InvalidRequest");
}
?>
