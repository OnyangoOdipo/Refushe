<?php
include 'db.php';

// Check if the request is for JSON response and a specific course ID is provided
if (isset($_GET['json']) && $_GET['json'] == 'true' && isset($_GET['id'])) {
    $course_id = intval($_GET['id']); // Sanitize the course ID
    
    // Prepare the SQL query to fetch the specific course by ID
    $sql = "SELECT * FROM courses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch the course details
    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
        echo json_encode([$course]);
    } else {
        echo json_encode(array('message' => 'Course not found.'));
    }
    $stmt->close();
} else {
    // Default HTML response (listing all courses)
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="col-md-4 mb-4">
                <div class="card-grid h-100 justify-content-center">
                    <div class="banner-img"></div>
                    <img src="book.png" alt="profile image" class="profile-img">

                    <!-- Card Body -->
                    <div class="card-body text-center">

                        <!-- Course Details -->
                        <p><span class="badge badge-primary">' . $row['certificate_type'] . '</span></p>
                        <h5 class="card-title">' . $row['name'] . '</h5>
                        <p class="card-text">' . $row['duration'] . '</p>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer text-center">
                        <a href="javascript:void(0);" class="text-inf text-center view-more" data-course-id="' . $row['id'] . '">
                            <strong>View More <i class="fa fa-angle-right"></i></strong>
                        </a>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo "No courses found.";
    }
}

$conn->close();
?>
