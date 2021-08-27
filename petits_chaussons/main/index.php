<?php
session_start();
if($_SESSION['email']) {
    header('Location: ./dashboard/index.php');
}

else {
    header('Location: ./inscription/index.php');
}

?>