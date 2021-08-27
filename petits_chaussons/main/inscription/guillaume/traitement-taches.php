<?php

/*Input : Titre, (auteur dynamiquement), description, date de fin, responsable, statut (pending, ....), catégorie (public privé), liste de personne à assigner à la tache */

session_start();

$titreInput = htmlspecialchars($_POST['titre']);
$descriptionInput = htmlspecialchars($_POST['description']);
$dateInput = htmlspecialchars($_POST['date']);
$responsableInput = htmlspecialchars($_POST['responsable']);
$statutInput = htmlspecialchars($_POST['statut']);
$categorieInput = htmlspecialchars($_POST['categorie']);
$listeInput = htmlspecialchars($_POST['liste']);

include '../dbConnect.php'; /* PDO */
include '../Class/user.class.php'; 


$user = new User;
$userId = $user->id;

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




?>