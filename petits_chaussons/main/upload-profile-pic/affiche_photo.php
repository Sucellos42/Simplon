<?php
    session_start();
    $ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
    include $ROOT_DIR . 'includeClasses.php'; // Créer un utilisateurs
    include $ROOT_DIR . 'dbConnect.php'; //PDO

    $user = new User();
    $userId = $user->id;

    $affichePhoto = "SELECT photo FROM users WHERE id = :userId";

    $affichePhotoPrepare = $pdo->prepare($affichePhoto);

    $affichePhotoPrepare->bindParam(':userId',$userId);

    $affichePhotoPrepare->execute();

    $row = $affichePhotoPrepare->fetch();
    
    echo ($row['photo']);
    
?>