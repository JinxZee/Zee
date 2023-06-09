<?php

$host = 'localhost:3307';
$db   = 'winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);

} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


if (isset($_POST['knopje'])) {
 
     $sql = "INSERT INTO producten (product_code, product_naam, prijs_per_stuk, omschrijving) VALUES (NULL, :product_naam, :prijs_per_stuk, :omschrijving)";
     $stmt= $pdo->prepare($sql);


     $data = [
          "product_naam" => $_POST['product_naam'],
          "prijs_per_stuk" => $_POST['prijs_per_stuk'],
          "omschrijving" => $_POST['omschrijving']
     ];


 $stmt->execute($data);

}


$stmt = $pdo->query("SELECT * FROM producten");
$result = $stmt->fetchAll();

foreach ($result as $row) {

     echo $row['product_code'] . " " .$row['product_naam'] . " " .$row['prijs_per_stuk'] . " " . $row['omschrijving'] . "<br>";
}








?>


<!DOCTYPE html>
<html lang="en">
<head>

     <title>Document</title>
</head>
<body>
     
<form method="POST">
<input type="text" name="product_naam" placeholder="product_naam">
<input type="text" name="prijs_per_stuk" placeholder="prijs_per_stuk">
<input type="text" name="omschrijving" placeholder="Omschrijving">
<input type="submit" name="knopje" >
</form>





</body>
</html>




















