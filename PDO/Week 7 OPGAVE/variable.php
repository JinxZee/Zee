<?php
session_start();

// Display the session variables
echo "Name: " . $_SESSION['name'] . "<br>";
echo "Email: " . $_SESSION['email'];
?>
