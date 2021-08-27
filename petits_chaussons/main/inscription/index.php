<?php
session_start();
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

if($_SESSION['email']) {
    header('Location: ' . $ROOT_DIR .  'dashboard/index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>inscription</title>
</head>
<body>

<header>
    <div class="bloc-texte">
        <h1>Pour vos grands projets,<br/>
        optez pour les petits<br/>
        chaussons<br/></h1>
    </div>
    <nav>
        <ul>
            <li><a href="../connexion/index.php" class="accueil">ACCUEIL</a></li>
            <li><a href="../a-propos/a-propos.php" class="propos">À PROPOS</a></li>
        </ul>
    </nav>
</header>

<section class="corp">
    <div class="bloc-logo">
        <img src="../assets/inscription-connexion/miellat-logo.png" alt="logo petit chausson"/>
        <img src="../assets/inscription-connexion/miellat-texte.png" alt="texte logo">
    </div>

    <div class="bloc-form">
        <form action="inscription-form.php" method="POST">
            <h2>S'INSCRIRE</h2> 
            <div class="nom-prenom">
            <div class="prenom">
                <label for="prenom">Prénom</label>
                <input type="prenom" id="prenom" name="prenom"/>
            </div>
            <div class="nom">
                <label for="Nom">Nom</label>
                <input type="nom" id="nom" name="nom"/>
            </div>   
            </div>     
                <label for="mail">Adresse e-mail</label>
                <input type="email" id="mail" name="mail"/>
               
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password"/>
                <label for="confirm-password">Confirmer le mot de passe</label>
                <input type="password" id="confirm-password" name="confirm-password"/>
                <input type="submit" class="connexion" value="S'INSCRIRE"/>
         </form>
        <button class="inscription"><a href="../connexion/index.php">SE CONNECTER</a></button>
    </div>
</section>

    
</body>
</html>
