<?php

//Input : Titre, (auteur dynamiquement), description, date de fin, responsable, statut (pending, ....), catégorie (public privé), liste de personne à assigner à la tache

session_start();
include '../dashboard/dbConnect.php';
include '../dashboard/Class/user.class.php'; 

$user = new User;
$userId = $user->id;

$titreInput = "Hello";
$descriptionInput = "hola";
$dateInput = "2021-08-23";
$responsableInput = $userId;
$statutInput = 1;
$categorieInput = 1;
$listeInput = "";





try {
    $pdo = new PDO ("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    
    $requete = "INSERT INTO tasks (author_id, titre, description, end_date, responsible, status, category)
    VALUES (:author_id, :titre, :description, :end_date, :responsible, :status, :category)";
    
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(":author_id", $userId);
    $stmt->bindParam(":titre", $titreInput);
    $stmt->bindParam(":description", $descriptionInput);
    $stmt->bindParam(":end_date", $dateInput);
    $stmt->bindParam(":responsible", $responsableInput);
    $stmt->bindParam(":status", $statutInput);
    $stmt->bindParam(":category", $categorieInput);
    
    
    $stmt->execute();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}    

catch(PDOException $e) {
    echo $e;
}



?>