<?php

    session_start();
    
    $ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
    include $ROOT_DIR . 'includeClasses.php'; // Créer un utilisateurs
    include $ROOT_DIR . 'dbConnect.php'; //PDO
    
    
    $img = $_FILES['img'];

    $user = new User();
    $userId = $user->id;
    //echo $userId;

    $insertImg = "UPDATE users SET photo =:img WHERE id = :user_id";

    $insertImgPrepare = $pdo->prepare($insertImg);

    $insertImgPrepare->bindParam(':img', $_FILES['img']['tmp_name']);
    $insertImgPrepare->bindParam(':user_id',$userId);

    $insertImgPrepare->execute();

    header('location:affiche_photo.php');

    ?>



