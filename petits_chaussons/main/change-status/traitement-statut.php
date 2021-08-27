<?php

if (empty($_POST['Status'])) {
    header('Location: ../dashboard/index.php');
}
// Lien vers le PDO 
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
include $ROOT_DIR . 'dbConnect.php';

$value = $_POST['Status'];
// On explose la chaîne de caractère en un tableau avec 2 valeurs
$arrayValue = explode(' ', $value);

$taskId = $arrayValue[0]; // ID
$taskStatus = $arrayValue[1]; // Statut


// Requête SQL , Met à jour la colonne status de la table tasks
$majStatus = "UPDATE tasks SET status = (SELECT status.id FROM status WHERE label = :taskStatus) WHERE tasks.id = :taskId";

// On prépare la requête SQL 
$majStatusPDO = $pdo->prepare($majStatus);

$majStatusPDO->bindParam(':taskStatus', $taskStatus);
$majStatusPDO->bindParam(':taskId', $taskId);

$majStatusPDO->execute();
header('Location: ../dashboard/index.php');


?>