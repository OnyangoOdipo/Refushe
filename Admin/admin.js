// Toggle sidebar menu in mobile view
const menuIcon = document.getElementById('menuicn');
const nav = document.querySelector('.nav');

menuIcon.addEventListener('click', () => {
    nav.classList.toggle('nav-active');
});

// Function to show the "All Applications" section
document.getElementById('VisitorOption').addEventListener('click', () => {
    document.getElementById('allapplications').style.display = 'block';
    document.getElementById('reportsSection').style.display = 'none';
});

// Function to show the "Reports" section
document.getElementById('reportsOption').addEventListener('click', () => {
    document.getElementById('reportsSection').style.display = 'block';
    document.getElementById('allapplications').style.display = 'none';
});

// Function to download the report
function downloadReport() {
    // Example of generating a simple text file as a download
    const reportData = 'This is a simple report data example';
    const blob = new Blob([reportData], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'report.txt';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

// Initialize Chart.js example chart
const ctx = document.getElementById('applicationstats').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar', // Choose the chart type
    data: {
        labels: ['Approved', 'Pending', 'Declined'],
        datasets: [{
            label: '# of Applications',
            data: [50, 80, 80], // Sample data
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)'
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

// Example to show the main sections based on user selection
document.addEventListener('DOMContentLoaded', function () {
    // Display the initial dashboard view or hide other sections
    document.getElementById('allapplications').style.display = 'none';
    document.getElementById('reportsSection').style.display = 'none';
});
// Get elements
const settingsButton = document.querySelector('.nav-option.option6');
const settingsModal = document.getElementById('settingsModal');
const closeModalButton = document.querySelector('.close-btn');
const saveSettingsButton = document.getElementById('saveSettings');
const themeToggle = document.getElementById('themeToggle');
const notificationsToggle = document.getElementById('notificationsToggle');

// Show the settings modal when the settings button is clicked
settingsButton.addEventListener('click', () => {
    settingsModal.style.display = 'block';
});

// Close the modal when the close button is clicked
closeModalButton.addEventListener('click', () => {
    settingsModal.style.display = 'none';
});

// Save settings and apply changes
saveSettingsButton.addEventListener('click', () => {
    // Apply theme
    const selectedTheme = themeToggle.value;
    if (selectedTheme === 'dark') {
        document.body.classList.add('dark-theme');
    } else {
        document.body.classList.remove('dark-theme');
    }

    // Apply notifications settings
    const notificationsEnabled = notificationsToggle.checked;
    if (notificationsEnabled) {
        alert('Notifications enabled');
    } else {
        alert('Notifications disabled');
    }

    // Close modal after saving
    settingsModal.style.display = 'none';
});

// Close the modal if the user clicks outside of it
window.addEventListener('click', (event) => {
    if (event.target == settingsModal) {
        settingsModal.style.display = 'none';
    }
});

// Apply saved theme on page load
document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-theme');
        themeToggle.value = 'dark';
    } else {
        document.body.classList.remove('dark-theme');
        themeToggle.value = 'light';
    }

    if (localStorage.getItem('notifications') === 'true') {
        notificationsToggle.checked = true;
    } else {
        notificationsToggle.checked = false;
    }
});

// Save settings in localStorage
saveSettingsButton.addEventListener('click', () => {
    localStorage.setItem('theme', themeToggle.value);
    localStorage.setItem('notifications', notificationsToggle.checked);
});

