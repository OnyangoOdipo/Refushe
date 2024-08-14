<?php
include 'db.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- Banner Image -->
                <img src="assets/images/logo.png" class="card-img-top" alt="Banner Image">

                <!-- Card Body -->
                <div class="card-body text-center">
                    <!-- Course Details -->
                    <p><span class="badge badge-primary">' . $row['certificate_type'] . '</span></p>
                    <h5 class="card-title">' . $row['name'] . '</h5>
                    <p class="card-text">' . $row['duration'] . '</p>
                </div>

                <!-- Card Footer -->
                <div class="card-footer text-center">
                    <a href="Home/PublicProgrammes.php" class="text-inf text-center view-more">
                        <strong>View More <i class="fa fa-angle-right"></i></strong>
                    </a>
                </div>

            </div>
        </div>';
    }
} else {
    echo "No courses found.";
}

$conn->close();
?>
