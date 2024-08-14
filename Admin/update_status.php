<?php
include '../Backend/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id']) && isset($data['status'])) {
        $applicationId = $data['id'];
        $newStatus = $data['status'];

        $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
        $stmt->bind_param('si', $newStatus, $applicationId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Missing ID or status']);
    }
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
