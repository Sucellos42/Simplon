<?php
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

session_start();
include $ROOT_DIR . 'dbConnect.php';
include $ROOT_DIR . 'includeClasses.php';
include $ROOT_DIR . 'header.php';
include $ROOT_DIR . 'functions.php';
    
    
    $img = file_get_contents($_FILES['img']['tmp_name']);

    $user = new User();
    $userId = $user->id;
    //echo $userId;

    $insertImg = "UPDATE users SET photo =:img WHERE id = :user_id";

    $insertImgPrepare = $pdo->prepare($insertImg);

    $insertImgPrepare->bindParam(':img', $img);
    $insertImgPrepare->bindParam(':user_id',$userId);

    $insertImgPrepare->execute();

    header('Location: testview.php');

    ?>



