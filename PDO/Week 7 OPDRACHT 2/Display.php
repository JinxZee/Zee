<?php
session_start();

if (isset($_SESSION['product_id'])) {
    foreach ($_SESSION['product_id'] as $id) {
        echo "ID: " . $id . "<br>";
    }
}
?>
