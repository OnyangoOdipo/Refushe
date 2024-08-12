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
                        <h2 class="topic-heading">300</h2>
                        <h2 class="topic">Applications</h2>
                    </div>
                    <i class="fas fa-user"></i>
                </div>
                <div class="box box2">
                    <div class="text">
                        <h2 class="topic-heading">80</h2>
                        <h2 class="topic">Pending</h2>
                    </div>
                    <i class="fa-solid fa-spinner"></i>
                </div>
                <div class="box box3">
                    <div class="text">
                        <h2 class="topic-heading">50</h2>
                        <h2 class="topic">Approved</h2>
                    </div>
                    <i class="fa-solid fa-person-circle-check" style="color: black;"></i>
                </div>
                <div class="box box4">
                    <div class="text">
                        <h2 class="topic-heading">80</h2>
                        <h2 class="topic">Declined</h2>
                    </div>
                    <i class="fa-solid fa-user-slash" style="color: black;"></i>
                </div>
            </div>
            <!-- User Data Section -->
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
                        <div class="item1">
                            <h3 class="t-op-nextlvl">Ambiyo Ludwaro</h3>
                            <h3 class="t-op-nextlvl">ambiyo@gmail.com</h3>
                            <h3 class="t-op-nextlvl">Fashion And Design</h3>
                            <h3 class="t-op-nextlvl label-tag">Approved</h3>
                            <h3 class="t-op-nextlvl">2024-08-01</h3>
                        </div>
                        <div class="item1">
                            <h3 class="t-op-nextlvl">Jasmine Ludwaro</h3>
                            <h3 class="t-op-nextlvl">jludwaro@gmail.com</h3>
                            <h3 class="t-op-nextlvl">Digital Literacy</h3>
                            <h3 class="t-op-nextlvl label-tag">Under Review</h3>
                            <h3 class="t-op-nextlvl">2024-08-02</h3>
                        </div>

                        <div class="item1">
                            <h3 class="t-op-nextlvl">Ambiyo Ludwaro</h3>
                            <h3 class="t-op-nextlvl">ambiyo@gmail.com</h3>
                            <h3 class="t-op-nextlvl">Fashion And Design</h3>
                            <h3 class="t-op-nextlvl label-tag">Approved</h3>
                            <h3 class="t-op-nextlvl">2024-08-01</h3>
                        </div>
                        <div class="item1">
                            <h3 class="t-op-nextlvl">Jasmine Ludwaro</h3>
                            <h3 class="t-op-nextlvl">jludwaro@gmail.com</h3>
                            <h3 class="t-op-nextlvl">Digital Literacy</h3>
                            <h3 class="t-op-nextlvl label-tag">Under Review</h3>
                            <h3 class="t-op-nextlvl">2024-08-02</h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="report-container" id="reportsSection" style="display: none;">
                <div class="report-header">
                    <h1 class="recent-Entities">Application Reports</h1>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op">Report Type</h3>
                        <h3 class="t-op">Download</h3>
                    </div>

                    <div class="items">
                        <div class="item1">
                            <h3 class="t-op-nextlvl">Application Statistics</h3>
                            <canvas id="applicationstats" width="400" height="200"></canvas>
                        </div>
                        <div class="item1">
                            <h3 class="t-op-nextlvl">Download Report</h3>
                            <button class="view" onclick="downloadReport()">Download</button>
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
                        <div class="item1">
                            <h3 class="t-op-nextlvl">Jasmine Ludwaro</h3>
                            <h3 class="t-op-nextlvl">Digital Literacy</h3>
                            <h3 class="t-op-nextlvl">2024-08-03</h3>
                            <h3 class="t-op-nextlvl label-tag">Pending</h3>
                        </div>
                        <div class="item1">
                            <h3 class="t-op-nextlvl">Nelly Karani</h3>
                            <h3 class="t-op-nextlvl">Fashion and Design</h3>
                            <h3 class="t-op-nextlvl">2024-08-04</h3>
                            <h3 class="t-op-nextlvl label-tag">Approved</h3>
                        </div>
                        <!-- More static visitor records can go here -->
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="admin.js"></script> <!-- Include your JavaScript file -->

    <script>
        // JavaScript for handling settings modal
        document.getElementById("settingsButton").addEventListener("click", function() {
            document.getElementById("settingsModal").style.display = "block";
        });

        document.querySelector(".close-btn").addEventListener("click", function() {
            document.getElementById("settingsModal").style.display = "none";
        });

        window.onclick = function(event) {
            if (event.target == document.getElementById("settingsModal")) {
                document.getElementById("settingsModal").style.display = "none";
            }
        };

        // Save settings function (for demonstration purposes)
        document.getElementById("saveSettings").addEventListener("click", function() {
            const theme = document.getElementById("themeToggle").value;
            const notificationsEnabled = document.getElementById("notificationsToggle").checked;
            alert(`Settings Saved! \nTheme: ${theme} \nNotifications: ${notificationsEnabled ? 'Enabled' : 'Disabled'}`);
            document.getElementById("settingsModal").style.display = "none";
        });
    </script>
</body>

</html>