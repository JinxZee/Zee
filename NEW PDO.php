<?php

$host = 'localhost:3307';
$db   = 'klanten';
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







if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['date']) || empty($_POST['email']) || empty($_POST['nummer'])){
        echo "Vul alstublieft alle velden in";
    } 
    
  else {
 
    $sql = "INSERT INTO contactlijst (contact_code, voornaam, achternaam, date, email, nummer) VALUES (NULL, :voornaam, :achternaam, :date, :email, :nummer)";
    $stmt= $pdo->prepare($sql);


    $data = [
         "voornaam" => $_POST['voornaam'],
         "achternaam" => $_POST['achternaam'],
         "date" => $_POST['date'],
         "email" => $_POST['email'],
         "nummer" => $_POST['nummer']

    ];


$stmt->execute($data);

  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>POST</title>
   <link rel="stylesheet" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
<h1>CONTACTLIJST</h1>

<table class="table table-dark table-striped">
  <tr>
    <th>CONTACT ID</th>
    <th>VOORNAAM</th>
    <th>ACHTERNAAM</th>
    <th>DATE</th>
    <th>EMAIL</th>
    <th>NUMMER</th>
    <th>Action</th>
  </tr> <?php
  $stmt = $pdo->query("SELECT * FROM contactlijst");
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo "<td>" . $row['contact_code'] . "</td>";
    echo "<td>" . $row['voornaam'] . "</td>";
    echo "<td>" . $row['achternaam'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['nummer'] . "</td>";
    echo "<td> <a href='update.php?contact_code=".$row['contact_code'] . "'>Edit</a></td>";
    echo "<td> <a href=''>Delete</a></td>";
?>
  <tr>
  <?php  }
  
  ?>
  </tr>

</table>

<div class="conntainer">
<form method="POST">

<label for="voornaam">Voornaam</label>
<input type="text" name="voornaam" >

<label for="achternaam">Achternaam</label>
<input type="text" name="achternaam" >
<label for="date">Date</label>
<input type="date" name="date">

<label for="email">Email</label>
<input type="email" name="email" >

<label for="nummer">Phonenumber</label>
<input type="number" name="nummer" >

<input type="submit" name="submit" value="Submit">

</form>
</div>




</body>
</html>