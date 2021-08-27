<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Erreur.css"/>
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>403</title>
</head>
<body>
    <div class="conteneur">
        <div id="erreur">
          <h1>Erreur 404</h1>
            <h2>Oups !</h2>
            <p class="message">Petit Chausson n'a pas trouvé ce que tu cherches.</p>
        </div>
        <div id="nav_logo">
            <nav>
                <ul>
                    <li id="acceuil"><a href="../index.php">Accueil</a></li>
                    <li id="propos"><a href="../a-propos/propos.php">A propos</a></li>
                </ul>
            </nav>
                <img src="./logo.png" alt="logo"/>
        </div>


    </div>

<?php
    include '../footer/footer.php';
?>

</body>
</html>