<?php
include '../Backend/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['application_id']) && isset($_POST['action'])) {
        $applicationId = $_POST['application_id'];
        $action = $_POST['action'];

        $newStatus = ($action === 'accept') ? 'Approved' : (($action === 'reject') ? 'Rejected' : null);

        if ($newStatus) {
            $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
            $stmt->bind_param('si', $newStatus, $applicationId);

            if ($stmt->execute()) {
                header("Location: admin.php");
                exit();
            } else {
                die("Error updating record: " . htmlspecialchars($conn->error));
            }

            $stmt->close();
        } else {
            die("Invalid action");
        }
    } else {
        die("Missing data");
    }
    $conn->close();
} else {
    die("Invalid request method");
}
?>