<?php

class database {
    public $pdo;

    public function __construct ($db="zee", $host="localhost:3307",  $user="root", $pass="") {
        try{
            $this->pdo = new PDO ("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Success";
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
    public function data($naam, $achternaam, $leeftijd, $land) {
        $sql = "INSERT INTO dittest (ID, naam, achternaam, leeftijd) VALUES (NULL, :naam, :achternaam, :leeftijd)";

        $stmt= $this->pdo->prepare($sql);

        $data = [
            "naam" => $naam,
            "achternaam" => $achternaam,
            "leeftijd" => $leeftijd,
        


        ];
        $stmt->execute($data);
    }

    public function select($ID = null) {
        if ($ID) {
            $stmt = $this->pdo->prepare("SELECT * FROM new2 WHERE ID = ?");
            $stmt->execute ([$ID]);
            $result = $stmt->fetch();
            return $result;
        } else


        $stmt = $this->pdo->query("SELECT * FROM new2");
        $result = $stmt->fetchAll();
        return $result;
    }
    
    public function UpdateUser(string $naam, string $achternaam, int $ID) {
    $stmt = $this->pdo->prepare("UPDATE new2 SET naam = ?, achternaam = ? WHERE ID = ?");
    $stmt->execute([$naam, $achternaam, $ID]);
    }

    public function DeleteUser(int $ID) {
    $stmt = $this->pdo->prepare("DELETE FROM new2 WHERE ID = ?");
    $stmt->execute([$ID]);
    }
}

?>