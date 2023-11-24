<?php 

include 'connectie.php';

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $db->data($_POST["email"], $_POST["password"]);
        echo "Successfull";
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
    <title>Document</title>
</head>
<body>
    
<form method="POST">
<label for="email">Email</label>
<input type="email" name="email" >
<label for="password">Password</label>
<input type="password" name="password">
<input type="submit" value="submit">





</form>




</body>
</html>


