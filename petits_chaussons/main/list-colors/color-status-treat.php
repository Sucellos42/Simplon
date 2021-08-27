<?php

session_start();
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
include $ROOT_DIR . 'dbConnect.php';
global $pdo;

$todoColor = htmlspecialchars($_POST['todo-colorchoose']);
$pendingColor = htmlspecialchars($_POST['pending-colorchoose']);
$toValidateColor = htmlspecialchars($_POST['to_validate-colorchoose']);
$doneColor = htmlspecialchars($_POST['done-colorchoose']);
$abandonedColor = htmlspecialchars($_POST['abandoned-colorchoose']);
    
$updateTodoColor =  "UPDATE status SET color = :todoColor 
        WHERE label = 'todo' ";
        $todoColor = substr($todoColor, 1);
        
        $preparePDO = $pdo->prepare($updateTodoColor);
        
        $preparePDO->bindParam(':todoColor', $todoColor);
        
        $preparePDO->execute();
    

        $updatePendingColor =  "UPDATE status SET color = :pendingColor 
        WHERE label = 'pending' ";
        $pendingColor = substr($pendingColor, 1);
        
        $preparePDO = $pdo->prepare($updatePendingColor);
        
        $preparePDO->bindParam(':pendingColor', $pendingColor);
        
        $preparePDO->execute();
    
        $updateToValidateColor =  "UPDATE status SET color = :toValidateColor 
        WHERE label = 'to_validate' ";
        $toValidateColor = substr($toValidateColor, 1);
        
        $preparePDO = $pdo->prepare($updateToValidateColor);
        
        $preparePDO->bindParam(':toValidateColor', $toValidateColor);
        
        $preparePDO->execute();


        $updateAbandonedColor =  "UPDATE status SET color = :abandonedColor 
        WHERE label = 'done' ";
        $abandonedColor = substr($abandonedColor, 1);
        
        $preparePDO = $pdo->prepare($updateAbandonedColor);
        
        $preparePDO->bindParam(':abandonedColor', $abandonedColor);
        
        $preparePDO->execute();
    
    unset($pdo);
    ///todo : lien de redirection
    header('Location: ../dashboard/index.php');
?>