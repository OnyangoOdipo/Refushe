<?php
session_start();
include 'db.php';

$response = array();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    $response['success'] = false;
    $response['message'] = 'You must be logged in to apply for a course.';
} else {
    // Retrieve the JSON data from the POST request
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['course_id'])) {
        $user_id = $_SESSION['user_id'];
        $course_id = $data['course_id'];

        // Insert the application into the database
        $sql = "INSERT INTO applications (user_id, course_id, application_date) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $course_id);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Successfully applied for the course.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Failed to apply for the course. Please try again.';
        }

        $stmt->close();
    } else {
        $response['success'] = false;
        $response['message'] = 'Invalid course ID.';
    }
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
