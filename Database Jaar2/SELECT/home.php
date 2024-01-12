<?php 

include 'db.php';
$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $db->data($_POST["name"], $_POST["lastname"], $_POST["age"]);
        echo "success";

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
    <title>php - - - Document - - - php</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="text" name="age" placeholder="age">
        <input type="submit" name="submit" value="submit">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Lastname</th>
            <th>Age</th>
        </tr>

        <tr> <?php
           $user = $db->select(1); ?>
            <td> <?php echo $user['ID']?> </td>
            <td> <?php echo $user['name']?> </td>
            <td> <?php echo $user['lastname']?> </td>
            <td> <?php echo $user['age']?> </td>
            <td> <a href=''>edit</a> </td>
            <td> <a href=''>Delete</a> </td>
        </tr>
    </table>
</body>
</html>
