<?php
session_start();

// Logout function
function logout() {
    // Clear all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Check if logout request is sent
if (isset($_POST['logout'])) {
    logout();
} else {
    // Redirect to the login page if logout request is not sent
    header("Location: login.php");
    exit;
}