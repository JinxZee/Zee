<?php
include 'db.php';

try {
    $db = new Database();
    $db->DeleteUser($_GET['ID']);

    header("Location:home.php");

} catch (Exception $e) {
    
    echo "Error " . $e->getMessage();
}

?>