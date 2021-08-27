<?php
if (empty($_POST['Category'])) {
    header('Location: ../dashboard/index.php');
}
// Lien vers le PDO 
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
include $ROOT_DIR . 'dbConnect.php';

$value = $_POST['Category'];
// On explose la chaîne de caractère en un tableau avec 2 valeurs
$arrayValue = explode(' ', $value);

$taskId = $arrayValue[0]; // ID
$taskCategory = $arrayValue[1]; // Statut


// Requête SQL , Met à jour la colonne status de la table tasks
$majStatus = "UPDATE tasks SET category = (SELECT categories.id FROM categories WHERE label = :taskCategory) WHERE tasks.id = :taskId";

// On prépare la requête SQL 
$majStatusPDO = $pdo->prepare($majStatus);

$majStatusPDO->bindParam(':taskCategory', $taskCategory);
$majStatusPDO->bindParam(':taskId', $taskId);

$majStatusPDO->execute();
header('Location: ../dashboard/index.php');


?>