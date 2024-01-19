<?php
    include 'db.php';

    try {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = htmlspecialchars($_POST['email']);
        $db = new Database();
        $user = $db->login($email);

        if ($user) {
            $wachtwoord = $_POST['wachtwoord'];
            $verify = password_verify($wachtwoord, $user['wachtwoord']);

            if ($verify) {
                session_start();
                $_SESSION['ID'] = $user['ID'];
                $_SESSION['naam'] = $user['naam'];
                header('Location:home.php?ingelogd');
            } else {
                echo "incorrect username or email";
            }
        } else {
            echo "incorrect username or email";
        }
    }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
        <div class="d-flex flex-column align-items-center">

            <h1>Login</h1>

            <form method="POST">
        
                <div class="mb-3">
                    <input type="text" name="email" placeholder="E-mail"required>
                </div>

                <div class="mb-3">
                    <input type="password" name="wachtwoord" placeholder="Wachtwoord"required>
                </div>

                <button type="submit">Submit</button>
                <p>Nog geen account?</p> <a href="aanmelden.php">Aanmelden</a>
            
            </form>

        </div>
</body>
</html>