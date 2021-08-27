<?php
session_start();

$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';


include $ROOT_DIR . 'dbConnect.php'; 
include $ROOT_DIR . 'includeClasses.php'; 

$user = new User;
$userId = $user->id;


$titreInput = htmlspecialchars($_POST['titre']);
$descriptionInput = htmlspecialchars($_POST['description']);
$responsableInput = htmlspecialchars($_POST['responsable']);
$statutInput = htmlspecialchars($_POST['statut']);
$categorieInput = htmlspecialchars($_POST['categorie']);
$assignedPeople = $_POST['assigned'];

if( $_POST['date']) {
    $dateInput = htmlspecialchars($_POST['date']);
}




// requete de création de taches dans la table task 

if( isset($dateInput) ) {
$requete = "INSERT INTO tasks (author_id, titre, description, end_date, responsible, status, category)
VALUES (:author_id, :titre, :description, :end_date, :responsible, :status, :category)";
$stmt = $pdo->prepare($requete);
$stmt->bindParam(":end_date", $dateInput);
}
else {
    $requete = "INSERT INTO tasks (author_id, titre, description, responsible, status, category)
    VALUES (:author_id, :titre, :description, :responsible, :status, :category)";    
    $stmt = $pdo->prepare($requete);
}




;
$stmt->bindParam(":author_id", $userId);
$stmt->bindParam(":titre", $titreInput);
$stmt->bindParam(":description", $descriptionInput);
$stmt->bindParam(":responsible", $responsableInput);
$stmt->bindParam(":status", $statutInput);
$stmt->bindParam(":category", $categorieInput);


$stmt->execute();


// requete de recherche de l'ID de la tache créer 
$rechercheId = "SELECT id FROM tasks 
WHERE author_id = :author_id 
ORDER BY id DESC LIMIT 1";

$stmt2 = $pdo->prepare($rechercheId);
$stmt2->bindParam(":author_id", $userId);
$stmt2->execute();

// récupération de l'ID de la tache créé 
$row = $stmt2->fetch();
$taskId = $row['id'];

foreach ( $assignedPeople as $toBeAssigned ) {
    $assigneId = "INSERT INTO assignedtasksusers(user_id, task_id) VALUES(:user_id, :task_id)";
    $stmt3 = $pdo->prepare($assigneId);
    $stmt3->bindParam(":user_id", $toBeAssigned);
    $stmt3->bindParam(":task_id", $taskId);
    $stmt3->execute();
}

header('Location: ../dashboard/index.php');

?>