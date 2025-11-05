<?php
require_once '../config.php';

// Destroy session
session_destroy();

// Clear session variables
$_SESSION = array();

// Delete session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Redirect to login page
redirect(SITE_URL . '/admin/login.php');
?>