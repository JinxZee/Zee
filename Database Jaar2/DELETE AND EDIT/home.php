<?php 

include 'db.php';
$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $db->data($_POST["naam"], $_POST["achternaam"], $_POST["leeftijd"],);
        echo "Success";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="POST">
        <input type="text" name="naam" placeholder="Naam">
        <input type="text" name="achternaam" placeholder="Achternaam">
        <input type="text" name="leeftijd" placeholder="Leeftijd">
        <input type="submit" name="submit" value="submit">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>naam</th>
            <th>achternaam</th>
            <th>leeftijd</th>
        </tr>

        <tr><?php
           $user = $db->select(); ?>
            <td> <?php echo $user['ID']?> </td>
            <td> <?php echo $user['naam']?> </td>
            <td> <?php echo $user['achternaam']?> </td>
            <td> <?php echo $user['leeftijd']?> </td>
            <td> <a href='update.php?id=<?php echo $user['ID']; ?>'>Edit</a> </td>
            <td> <a href='delete.php?id=<?php echo $user['ID']; ?>'>Delete</a> </td>
        </tr>
    </table>
</body>
</html>