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




$stmt = $pdo->query("SELECT * FROM producten");
$result = $stmt->fetchAll();

foreach ($result as $row) {

     echo $row['product_code'] . " " .$row['product_naam'] . " " .$row['prijs_per_stuk'] . " " . $row['omschrijving'] . "<br>";
}






?>
<h2>
<a href="delete.php?product_code=2">Delete Product 2</a>
</h2>

