<?php
session_start();
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

if(!$_SESSION['email']) {
    header('Location: ../index.php');
}
include $ROOT_DIR . 'includeClasses.php';
include $ROOT_DIR . 'functions.php';
include $ROOT_DIR . 'dbConnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/fenetre-modale.css">
    <script src="https://kit.fontawesome.com/eeb6c15f81.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php
    include $ROOT_DIR . 'header.php';
    ?>

    <div id="separateur">
        <img src="../assets/dashboard/background-header.svg" alt="separation">
    </div>
     
    <main>
        <section class="taches">
                <?php
                    searchTasks(1, 'not-assigned');
                    searchTasks(2, 'not-assigned');
                    searchTasks(3, 'not-assigned');
                    searchTasks(4, 'not-assigned');
                    searchTasks(5, 'not-assigned');
                    ?>

        
    </section>

    <?php
// include $ROOT_DIR . 'list-colors/color-status-form.php';
// include $ROOT_DIR . 'list-colors/color-category-form.php';
include $ROOT_DIR . 'fenetre-modale/change-color.php';
include $ROOT_DIR . 'fenetre-modale/change-color-status.php';
include $ROOT_DIR . 'fenetre-modale/ajout-tache/create-task-modale.php';
include $ROOT_DIR . 'upload-profile-pic/aside-profilepic-popup.php';

?>
    <div id="plus_btn"><img src="../assets/dashboard/plus_btn_white.svg" alt="bouton plus ajouter une tache"></div>
    <script src="../fenetre-modale/ajout-tache/modal.js"></script>


    </main>
</body>
</html>