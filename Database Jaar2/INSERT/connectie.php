<?php

class database {
    public $pdo;

    public function __construct ($db="zee", $host="localhost:3307",  $user="root", $pass="") {
        try{
            $this->pdo = new PDO ("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function  data($email, $password){    
        $sql = "INSERT INTO user (user_id, email, password ) VALUES (null, :email , :password)";
        $stmt= $this->pdo->prepare($sql);


$data = [
"email" => $email,
"password" => $password,

];

$stmt->execute($data);

}
}

?>


 
























































































































































































































































































































































































































































































































































































































































































































































































?>