    <a href="#modal-task" class="js-modal">Ajouter une tache</a>
    
    
    <aside id="modal-task" class="modal" aria-hidden="true" role="dialog" aria-labelledby="modal-title" style="display:none">
        <div class="modal-wrapper js-modal-stop" >
            <div class="mod-header">
                <button class="js-modal-close" type="button" aria-label="Fermer"><i class="far fa-times-circle"></i></button>
                <h1 id="modal-title">Ajouter une tâche</h1>
            </div>
            
            <?php
            $ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
            include $ROOT_DIR . './createTask/createTaskForm.php';
            ?>
            </div>
    </aside>
    




