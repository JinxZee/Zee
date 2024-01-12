<?php

class database {
    public $pdo;

    public function __construct ($db="ZEE", $host="localhost:3307",  $user="root", $pass="") {
        try{
            $this->pdo = new PDO ("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "Success";
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
    public function data($naam, $achternaam, $leeftijd, $land) {
        $sql = "INSERT INTO dittest (ID, name, lastname, age) VALUES (NULL, :name, :lastname, :age)";

        $stmt= $this->pdo->prepare($sql);

        $data = [
            "name" => $name,
            "lastname" => $lastname,
            "age" => $age,
          


        ];
        $stmt->execute($data);
    }

    public function select($ID = null) {

        if ($ID) {
            $stmt = $this->pdo->prepare("SELECT * FROM gegevens WHERE id = ?");
            $stmt->execute ([$ID]);
            $result = $stmt->fetch();
            return $result;
        } else
        $stmt = $this->pdo->query("SELECT * FROM gegevens");
        $result = $stmt->fetchAll();
        return $result;
    }
}

?>
