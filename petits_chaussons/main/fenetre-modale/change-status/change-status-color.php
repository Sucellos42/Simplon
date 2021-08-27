<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ajout-tache/modal.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/eeb6c15f81.js" crossorigin="anonymous"></script>
</head>
<body>
    <a href="#modal-status" class="js-modal">Ouvrir la boîte modale</a>
    
    <aside id="modal-status" class="modal" aria-hidden="true" role="dialog" aria-labelledby="modal-title" style="display:none">
        <div class="modal-wrapper js-modal-stop" id="wrapper-status">
            <div class="mod-header">
                <button class="js-modal-close" type="button" aria-label="Fermer"><i class="far fa-times-circle"></i></button>  
                <h2>Status</h2>

            </div>
            
            <?php
                session_start();
                $ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
                include $ROOT_DIR . 'dbConnect.php';
                include $ROOT_DIR . 'functions.php';
                include $ROOT_DIR . 'list-colors/color-category-form.php';
            ?>
        
</div>



        </div>
    </aside>
    <script src="../ajout-tache/modal.js"></script>
    
</body>
</html>