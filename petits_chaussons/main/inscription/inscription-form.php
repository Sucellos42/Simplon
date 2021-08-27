<?php

session_start();

$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';


$firstNameInput = htmlspecialchars($_POST['prenom']);
$lastNameInput = htmlspecialchars($_POST['nom']);
$emailInput = htmlspecialchars($_POST['mail']); 
$passwordInput = password_hash($_POST['password'], PASSWORD_DEFAULT);

if($_POST['password'] == $_POST['confirm-password']) {
    if(filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
        if(preg_match('/^\w+@paumfreet\.com$/i', $emailInput)) {
            include $ROOT_DIR . 'dbConnect.php';
            
            try {
                $pdo = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                
                
                $newUser =  "INSERT INTO users (firstname, lastname, email, hashed_password) VALUES (:firstname, :lastname, :email, :hashed_password)";
                $default_no_admin = "INSERT INTO is_user_admin(user_id, is_admin) VALUES((SELECT id FROM users WHERE email = :email), false)";
                
                
                $preparePDO = $pdo->prepare($newUser);
                $stmt = $pdo->prepare($default_no_admin);

                $stmt->bindParam(':email', $emailInput);

                $preparePDO->bindParam(':firstname', $firstNameInput);
                $preparePDO->bindParam(':lastname', $lastNameInput);
                $preparePDO->bindParam(':email', $emailInput);
                $preparePDO->bindParam(':hashed_password', $passwordInput);
                
                $preparePDO->execute();
                $stmt->execute();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                unset($pdo);
                ///todo : lien de redirection
                // header('Location: .php');
                header('Location: ../connexion/index.php');
            }
            catch(PDOException $e) {
                ///todo : lien de redirection
                echo('Votre e-mail est déjà enregistré. Souhaitez-vous <a href="../connexion/index.php">vous connecter ?</a>');
            }
        }
        else {
            echo("
             <span>l'adresse e-mail renseignee doit etre sous le format suivant : username@paumfreet.com
             </br>
             Souhaitez-vous <a href='../inscription/index.php'>retourner a la page d'inscription ?</a></span>");
        }
        
        
        
        
    }
    else {
        echo("vous n'avez pas renseigné une adresse email valide");
        ///todo : lien de redirection
        echo('<a href="index.php">retourner a la page precedente</a>');
    }
}
else {
    echo("les mots de passes ne correspondent pas");
    echo('<a href="index.php">retourner a la page precedente</a>');
}



?>