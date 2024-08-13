<?php
// Include the database connection file
include('../Backend/db.php'); // Adjust the path as needed

// Initialize variables
$totalUsers = 0;
$totalCourses = 0;

// Fetch total users count
$result = $conn->query("SELECT COUNT(*) AS count FROM users");
if ($result) {
    if ($row = $result->fetch_assoc()) {
        $totalUsers = $row['count'];
    }
} else {
    echo "Error fetching total users: " . $conn->error;
}

// Fetch total courses count
$resultCourses = $conn->query("SELECT COUNT(*) AS count FROM courses"); // Adjust table name as needed
if ($resultCourses) {
    if ($rowCourses = $resultCourses->fetch_assoc()) {
        $totalCourses = $rowCourses['count'];
    }
} else {
    echo "Error fetching total courses: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
                    <div class="nav-option option4">
                        <i class="fa-solid fa-people-roof"></i>
                        <h3>Applications</h3>
                    </div>
                    <div class="nav-option option3" id="reportsOption">
                        <i class="fa-solid fa-people-roof"></i>
                        <h3>Users</h3>
                    </div>

                    <div class="nav-option option3" id="reportsOption">
                        <i class="fa-solid fa-people-roof"></i>
                        <h3>Reports</h3>
                    </div>

                    <div class="nav-option option6">
                        <i class="fas fa-cog"></i>
                        <h3>Settings</h3>

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
                    </div>

                    <div class="nav-option logout">
                        <a href="../Backend/logout.php" class="logout-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <h3>Logout</h3>
                        </a>
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
                        <h2 class="topic-heading"><?php echo $totalUsers; ?></h2>
                        <h2 class="topic">Total Users</h2>
                    </div>
                    <i class="fas fa-user"></i>
                </div>
                <div class="box box2">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $totalCourses; ?></h2>
                        <h2 class="topic">Available Courses</h2>
                    </div>
                    <i class="fas fa-book"></i> <!-- Change the icon as needed -->
                </div>
                <!-- Additional boxes can be added similarly -->
            </div>

            <!-- User Data Section -->
            <div class="report-container" id="allapplications" style="display: none;">
                <div class="report-header">
                    <h1 class="recent-Entities">All Users</h1>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Name</h3>
                        <h3 class="t-op">Email</h3>
                        <h3 class="t-op">ID Document</h3>
                        <h3 class="t-op">Date Created</h3>
                    </div>

                    <div class="items">
                        <?php
                        $result = $conn->query("SELECT surname, other_names, email, id_document_name, created_at FROM users");
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='item1'>
                                    <h3 class='t-op-nextlvl'>{$row['surname']} {$row['other_names']}</h3>
                                    <h3 class='t-op-nextlvl'>{$row['email']}</h3>
                                    <h3 class='t-op-nextlvl'>{$row['id_document_name']}</h3>
                                    <h3 class='t-op-nextlvl'>{$row['created_at']}</h3>
                                </div>";
                            }
                        } else {
                            echo "Error fetching users: " . $conn->error;
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Recent Users Section -->
            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Entities">Recent Users</h1>
                    <button class="view">View All</button>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Name</h3>
                        <h3 class="t-op">Email</h3>
                        <h3 class="t-op">Date Created</h3>
                    </div>

                    <div class="items">
                        <?php
                        // Optionally limit to recent users or filter as needed
                        $result = $conn->query("SELECT surname, other_names, email, created_at FROM users ORDER BY created_at DESC LIMIT 5");
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='item1'>
                                    <h3 class='t-op-nextlvl'>{$row['surname']} {$row['other_names']}</h3>
                                    <h3 class='t-op-nextlvl'>{$row['email']}</h3>
                                    <h3 class='t-op-nextlvl'>{$row['created_at']}</h3>
                                </div>";
                            }
                        } else {
                            echo "Error fetching recent users: " . $conn->error;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="admin.js"></script> <!-- Include your Java
