<?php
include 'db.php';

try {
    $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hash = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
        $db->updateUser($_POST['email'], $hash, $_GET['ID']);
        header("Location:home.php");
    }
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <titleZee</title>
</head>
<body>
    <form method ="POST">
        <input type="text" name="email" placeholder="Email"> <br>
        <input type="text" name="wachtwoord" placeholder="Wachtwoord"> <br>
        <input type="submit">
    </form>
</body>
</html>