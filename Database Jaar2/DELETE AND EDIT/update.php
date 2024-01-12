<?php
include 'db.php';

try {
    $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hash = password_hash($_POST['achternaam'], PASSWORD_DEFAULT);
        $db->UpdateUser($_POST['naam'], $hash,$_GET['ID']);
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
</head>
<body>
    <form method ="POST">
        <input type="text" name="naam" placeholder="Naam"> <br>
        <input type="text" name="achternaam" placeholder="Achternaam"> <br>
        <input type="submit">
    </form>
</body>
</html>