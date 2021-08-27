<?php

session_start();

        
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
include $ROOT_DIR . 'dbConnect.php';

$emailInput = htmlspecialchars($_POST['mail']);
$passwordInput = $_POST['password'];



$sql = "SELECT hashed_password FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":email", $emailInput);
$stmt->execute();
$hash = $stmt->fetch()['hashed_password'];

if(password_verify($passwordInput, $hash)) {
    $_SESSION['email'] = $emailInput;
    ///todo : lien de redirection
    // header('Location: .php');
    header('Location: ../dashboard/index.php');

}
else {
    echo('Veuillez vérifier la combinaison email / mot de passe');
    echo('<a href="index.php">retourner a la page precedente</a>');
}


    

unset($pdo);

?>