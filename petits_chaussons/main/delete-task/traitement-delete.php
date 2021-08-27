<?php


if (empty($_POST['delete'])) {
    header('Location: ../dashboard/index.php');
}
// Lien vers le PDO 
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
include $ROOT_DIR . 'dbConnect.php';

$taskId = $_POST['delete'];



// Requête SQL , Met à jour la colonne status de la table tasks
$deleteTaskFromAssignedTasks = "DELETE FROM assignedtasksusers WHERE task_id = :taskId";
$deleteTaskFromTasks = "DELETE FROM tasks WHERE id = :taskId";

// On prépare la requête SQL 
$stmt1 = $pdo->prepare($deleteTaskFromAssignedTasks);
$stmt2 = $pdo->prepare($deleteTaskFromTasks);

$stmt1->bindParam(':taskId', $taskId);

$stmt2->bindParam(':taskId', $taskId);

$stmt1->execute();
$stmt2->execute();
header('Location: ../dashboard/index.php');


?>