<?php

class database {
    public $pdo;

    public function __construct ($db="test", $host="localhost",  $user="root", $pass="") {
        try{
            $this->pdo = new PDO ("mysql:$host=;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected";
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
}

?>
