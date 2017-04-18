<?php
if (!isset($_SESSION['valid_user'])) {
    echo "This is a secured page please login to continue";
    echo "<p><a href=\"?page=by-dev-authmain\">ISE Bypass Login Page</a></p>";
} 
?>
