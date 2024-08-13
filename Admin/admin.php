<?php
include '../Backend/db.php';

// Initialize counters
$totalApplications = 0;
$pendingCount = 0;
$approvedCount = 0;
$declinedCount = 0;

// Query for total number of applications
$sqlTotal = "SELECT COUNT(*) as total FROM applications";
$resultTotal = $conn->query($sqlTotal);
if ($resultTotal->num_rows > 0) {
    $rowTotal = $resultTotal->fetch_assoc();
    $totalApplications = $rowTotal['total'];
}

// Query for count of pending applications
$sqlPending = "SELECT COUNT(*) as pending FROM applications WHERE status = 'Pending'";
$resultPending = $conn->query($sqlPending);
if ($resultPending->num_rows > 0) {
    $rowPending = $resultPending->fetch_assoc();
    $pendingCount = $rowPending['pending'];
}

// Query for count of approved applications
$sqlApproved = "SELECT COUNT(*) as approved FROM applications WHERE status = 'Approved'";
$resultApproved = $conn->query($sqlApproved);
if ($resultApproved->num_rows > 0) {
    $rowApproved = $resultApproved->fetch_assoc();
    $approvedCount = $rowApproved['approved'];
}

// Query for count of declined applications
$sqlDeclined = "SELECT COUNT(*) as declined FROM applications WHERE status = 'Declined'";
$resultDeclined = $conn->query($sqlDeclined);
if ($resultDeclined->num_rows > 0) {
    $rowDeclined = $resultDeclined->fetch_assoc();
    $declinedCount = $rowDeclined['declined'];
}

// Query to fetch all applications with correct column names
$sqlApplications = "SELECT u.surname, u.other_names, u.email, c.name AS course_name, a.status, a.application_date
                    FROM applications a
                    JOIN users u ON a.user_id = u.id
                    JOIN courses c ON a.course_id = c.id";
$resultApplications = $conn->query($sqlApplications);

// Prepare an empty array to store applications
$applications = [];

// Fetch applications and store in the array
if ($resultApplications->num_rows > 0) {
    while ($row = $resultApplications->fetch_assoc()) {
        $applications[] = $row;
    }
}

// Fetch user data and categorize based on ID document type
$sqlUsers = "SELECT id, surname, other_names, email, id_document_name FROM users";
$resultUsers = $conn->query($sqlUsers);
$users = [];
if ($resultUsers->num_rows > 0) {
    while ($row = $resultUsers->fetch_assoc()) {
        $users[] = $row;
    }
}

// Fetch application counts by status
$sqlApplicationStats = "SELECT 
                            COUNT(*) as total,
                            SUM(status = 'Pending') as pending,
                            SUM(status = 'Approved') as approved,
                            SUM(status = 'Declined') as declined
                        FROM applications";
$resultStats = $conn->query($sqlApplicationStats);
$stats = $resultStats->fetch_assoc();

// Query to fetch all courses sorted by ID in descending order
$sqlCourses = "SELECT id, name, description FROM courses ORDER BY id DESC";
$resultCourses = $conn->query($sqlCourses);

// Prepare an empty array to store courses
$courses = [];

// Fetch courses and store in the array
if ($resultCourses->num_rows > 0) {
    while ($row = $resultCourses->fetch_assoc()) {
        $courses[] = $row;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['download_csv'])) {
        downloadCSV($applications);
    }
}


function downloadCSV($applications)
{
    $filename = "applications_report.csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');

    $output = fopen("php://output", "w");

    // Write the column headers
    fputcsv($output, array('Surname', 'Other Names', 'Email', 'Course Name', 'Status', 'Application Date'));

    // Write each row of data
    foreach ($applications as $application) {
        fputcsv($output, $application);
    }

    fclose($output);
    exit();
}


// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="admin.css">

</head>

<body>

    <!-- Header Section -->
    <header>
        <div class="logosec">
            <div class="logo">RefuSHE</div>
            <i class="fas fa-bars menuicn" id="menuicn"></i>
        </div>

        <div class="searchbar">
            <input type="text" placeholder="Search">
            <div class="searchbtn">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <div class="message">
            <div class="circle"></div>
            <i class="fas fa-envelope"></i>
            <div class="dp">
                <img src="img3.png" class="dpicn" alt="profile-pic">
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                        <i class="fas fa-tachometer-alt"></i>
                        <h3>Dashboard</h3>
                    </div>
                    <div class="nav-option option2" id="VisitorOption">
                        <i class="fas fa-user"></i>
                        <h3>Courses</h3>
                    </div>
                    <div class="nav-option option4" id="applicationsOption">
                        <i class="fa-solid fa-people-roof"></i>
                        <h3>Applications</h3>
                    </div>
                    <div class="nav-option option3" id="usersOption">
                        <i class="fa-solid fa-people-roof"></i>
                        <h3>Users</h3>
                    </div>

                    <div class="nav-option option3" id="reportsOption">
                        <i class="fa-solid fa-people-roof"></i>
                        <h3>Reports</h3>
                    </div>


                    <div class="nav-option option6" id="settingsButton">
                        <i class="fas fa-cog"></i>
                        <h3>Settings</h3>
                    </div>

                    <!-- Modal -->
                    <div id="settingsModal" class="settings-modal" style="display: none;">
                        <div class="settings-modal-content">
                            <span class="close-btn">&times;</span>
                            <h2>Settings</h2>

                            <div class="settings-option">
                                <label for="profilePic">Change Profile Picture:</label>
                                <input type="file" id="profilePic" accept="image/*">
                            </div>

                            <div class="settings-option">
                                <label for="themeToggle">Theme:</label>
                                <select id="themeToggle">
                                    <option value="light">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>

                            <div class="settings-option">
                                <label for="notificationsToggle">Enable Notifications:</label>
                                <input type="checkbox" id="notificationsToggle">
                            </div>

                            <button id="saveSettings" class="save-btn">Save Settings</button>
                        </div>
                    </div>


                    <div class="nav-option logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <h3>Logout</h3>
                    </div>
                </div>
            </nav>
        </div>

        <div class="main">
            <div class="searchbar2">
                <input type="text" name="" id="" placeholder="Search">
                <div class="searchbtn">
                    <i class="fas fa-search"></i>
                </div>
            </div>

            <div class="box-container">
                <div class="box box1">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $totalApplications; ?></h2>
                        <h2 class="topic">Applications</h2>
                    </div>
                    <i class="fas fa-user"></i>
                </div>
                <div class="box box2">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $pendingCount; ?></h2>
                        <h2 class="topic">Pending</h2>
                    </div>
                    <i class="fa-solid fa-spinner"></i>
                </div>
                <div class="box box3">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $approvedCount; ?></h2>
                        <h2 class="topic">Approved</h2>
                    </div>
                    <i class="fa-solid fa-person-circle-check" style="color: black;"></i>
                </div>
                <div class="box box4">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $declinedCount; ?></h2>
                        <h2 class="topic">Declined</h2>
                    </div>
                    <i class="fa-solid fa-user-slash" style="color: black;"></i>
                </div>
            </div>

            <!-- Courses Section -->
            <div class="report-container" id="coursesSection" style="display: none;">
                <div class="report-header">
                    <h1 class="recent-Entities">All Courses</h1>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Course ID</h3>
                        <h3 class="t-op">Course Name</h3>
                        <h3 class="t-op">Description</h3>
                    </div>

                    <div class="items">
                        <?php foreach ($courses as $course): ?>
                            <div class="item1">
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($course['id']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($course['name']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($course['description']); ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- User Application Section -->
            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Entities">User Applications</h1>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Application ID</h3>
                        <h3 class="t-op">Status</h3>
                        <h3 class="t-op">Actions</h3>
                    </div>

                    <div class="items">
                        <?php foreach ($applications as $application): ?>
                            <div class="item1">
                                <h3 class="t-op-nextlvl"><?php echo isset($application['id']) ? htmlspecialchars($application['id']) : 'Not Available'; ?></h3>
                                <h3 class="t-op-nextlvl label-tag"><?php echo isset($application['status']) ? htmlspecialchars($application['status']) : 'Not Available'; ?></h3>
                                <div class="t-op-nextlvl">
                                    <form action="buttons.php" method="POST" class="application-actions">
                                        <input type="hidden" name="application_id" value="<?php echo isset($application['id']) ? htmlspecialchars($application['id']) : ''; ?>">
                                        <button type="submit" name="action" value="accept" class="btn-accept">Accept</button>
                                        <button type="submit" name="action" value="reject" class="btn-reject">Reject</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="report-container" id="allapplications" style="display: none;">
                <div class="report-header">
                    <h1 class="recent-Entities">All Applications</h1>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Name</h3>
                        <h3 class="t-op">Email</h3>
                        <h3 class="t-op">Course Applied For</h3>
                        <h3 class="t-op">Application Status</h3>
                        <h3 class="t-op">Date of Application</h3>
                    </div>

                    <div class="items">
                        <?php foreach ($applications as $application): ?>
                            <div class="item1">
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($application['surname'] . ' ' . $application['other_names']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($application['email']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($application['course_name']); ?></h3>
                                <h3 class="t-op-nextlvl label-tag"><?php echo htmlspecialchars($application['status']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($application['application_date']); ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="report-container" id="reportsSection">
                <div class="report-header">
                    <h1 class="recent-Entities">Application Reports</h1>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Report Type</h3>
                        <h3 class="t-op">Details</h3>
                    </div>

                    <div class="items">
                        <!-- Report for users categorized by document type -->
                        <div class="item1">
                            <h3 class="t-op-nextlvl" style="color: black">User Categorization</h3>
                            <div class="report-details">
                                <h3 class="t-op-nextlvl" style="color: black">Refugees
                                    <?php echo count(array_filter($users, fn($user) => $user['id_document_name'] === 'Alien Card')); ?>
                                </h3>
                                <h3 class="t-op-nextlvl" style="color: black">Citizens
                                    <?php echo count(array_filter($users, fn($user) => $user['id_document_name'] !== 'Alien Card')); ?>
                                </h3>
                            </div>
                        </div>

                        <!-- Report for application statistics chart -->
                        <div class="item1">
                            <h3 class="t-op-nextlvl" style="color: black">Application Statistics</h3>
                            <canvas id="applicationstats" width="400" height="200"></canvas>
                        </div>

                        <!-- Button to download report -->
                        <div class="item1">
                            <form method="post" action="admin.php">
                                <button class="view" type="submit" name="download_csv">Download CSV</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>


            <!-- Recent Applications Section -->
            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Entities">Recent Course Applications</h1>
                    <button class="view">View All</button>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Applicant Name</h3>
                        <h3 class="t-op">Course</h3>
                        <h3 class="t-op">Application Date</h3>
                        <h3 class="t-op">Status</h3>
                    </div>

                    <div class="items">
                        <?php foreach ($applications as $application): ?>
                            <div class="item1">
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($application['surname'] . ' ' . $application['other_names']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($application['course_name']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($application['application_date']); ?></h3>
                                <h3 class="t-op-nextlvl label-tag"><?php echo htmlspecialchars($application['status']); ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Users Section -->
            <div class="report-container" id="usersSection" style="display: none;">
                <div class="report-header">
                    <h1 class="recent-Entities">All Users</h1>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">ID</h3>
                        <h3 class="t-op">Surname</h3>
                        <h3 class="t-op">Other Names</h3>
                        <h3 class="t-op">Email</h3>
                    </div>

                    <div class="items">
                        <?php foreach ($users as $user): ?>
                            <div class="item1">
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($user['id']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($user['surname']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($user['other_names']); ?></h3>
                                <h3 class="t-op-nextlvl"><?php echo htmlspecialchars($user['email']); ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--<script src="admin.js"></script> Include your JavaScript file -->

    <script>
        // JS to get course
        document.getElementById("VisitorOption").addEventListener("click", function() {
            document.getElementById("allapplications").style.display = "none";
            document.getElementById("reportsSection").style.display = "none";
            document.getElementById("usersSection").style.display = "none";
            document.getElementById("coursesSection").style.display = "block";
        });

        // Applications section
        document.getElementById("applicationsOption").addEventListener("click", function() {
            // Hide all other sections
            document.getElementById("coursesSection").style.display = "none";
            document.getElementById("reportsSection").style.display = "none";
            document.getElementById("usersSection").style.display = "none";
            document.getElementById("allapplications").style.display = "block";
        });

        // Users section
        document.getElementById("usersOption").addEventListener("click", function() {
            // Hide all other sections
            document.getElementById("coursesSection").style.display = "none";
            document.getElementById("reportsSection").style.display = "none";
            document.getElementById("allapplications").style.display = "none";
            document.getElementById("usersSection").style.display = "block";
        });

        // Reports Section
        document.getElementById("reportsOption").addEventListener("click", function() {
            document.getElementById("reportsSection").style.display = "block";
            document.getElementById("usersSection").style.display = "none"; // Hide other sections if necessary
            document.getElementById("allapplications").style.display = "none"; // Hide other sections if necessary
        });

        // Settings
        document.addEventListener('DOMContentLoaded', function() {
            const settingsButton = document.getElementById("settingsButton");
            const settingsModal = document.getElementById("settingsModal");
            const closeBtn = document.querySelector(".close-btn");
            const saveSettingsBtn = document.getElementById("saveSettings");
            const themeToggle = document.getElementById("themeToggle");
            const notificationsToggle = document.getElementById("notificationsToggle");

            const savedTheme = localStorage.getItem('theme') || 'light';
            document.body.classList.toggle('dark-theme', savedTheme === 'dark');
            themeToggle.value = savedTheme;

            settingsButton.addEventListener("click", function() {
                settingsModal.style.display = "block";
            });

            closeBtn.addEventListener("click", function() {
                settingsModal.style.display = "none";
            });

            window.onclick = function(event) {
                if (event.target === settingsModal) {
                    settingsModal.style.display = "none";
                }
            };

            saveSettingsBtn.addEventListener("click", function() {
                const theme = themeToggle.value;
                const notificationsEnabled = notificationsToggle.checked;

                document.body.classList.toggle('dark-theme', theme === 'dark');

                localStorage.setItem('theme', theme);
                localStorage.setItem('notificationsEnabled', notificationsEnabled);

                alert(`Settings Saved! \nTheme: ${theme} \nNotifications: ${notificationsEnabled ? 'Enabled' : 'Disabled'}`);
                settingsModal.style.display = "none";
            });
        });

        // Toggle sidebar menu in mobile view
        const menuIcon = document.getElementById('menuicn');
        const nav = document.querySelector('.nav');

        menuIcon.addEventListener('click', () => {
            nav.classList.toggle('nav-active');
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Chart.js configuration
            var ctx = document.getElementById('applicationstats').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Pending', 'Approved', 'Declined'],
                    datasets: [{
                        label: 'Number of Applications',
                        data: [<?php echo $stats['pending']; ?>, <?php echo $stats['approved']; ?>, <?php echo $stats['declined']; ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const menuIcon = document.getElementById('menuicn');
            const navContainer = document.querySelector('.navcontainer');

            menuIcon.addEventListener('click', () => {
                navContainer.classList.toggle('active');
            });

            // Optional: Hide sidebar when clicking outside
            document.addEventListener('click', (event) => {
                if (!navContainer.contains(event.target) && !menuIcon.contains(event.target)) {
                    navContainer.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>