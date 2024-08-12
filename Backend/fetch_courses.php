<?php
include 'db.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">
            <div class="card-grid h-100 justify-content-center">
                <div class="banner-img"></div>
                <img src="' . $row['image_url'] . '" alt="profile image" class="profile-img">
                <p><span class="badge badge-primary">' . $row['certificate_type'] . '</span></p>
                <h5 class="name">' . $row['name'] . '</h5>
                <p class="description">' . $row['description'] . '</p>
                <p>' . $row['duration'] . '</p>
                <div class="col-12" style="width:100%;position:absolute; bottom:0;">
                    <a href="' . $row['details_url'] . '" class="text-inf text-center">
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
