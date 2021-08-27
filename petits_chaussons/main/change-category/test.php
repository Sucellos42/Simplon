<?php
session_start();
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

include $ROOT_DIR . 'includeClasses.php';
include $ROOT_DIR . 'dbConnect.php';
include $ROOT_DIR . 'functions.php';

$user = new User;

$assignedTasks = $user->assignedTasks;

    foreach( $assignedTasks as $ass) {
        echo $ass . '</br>';
    }

?>