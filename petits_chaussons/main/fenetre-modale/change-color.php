    <a href="#modal-color" class="js-modal">Modifier la couleur des categories</a>
    
    <aside id="modal-color" class="modal" aria-hidden="true" role="dialog" aria-labelledby="modal-title" style="display:none">
        <div class="modal-wrapper js-modal-stop" >
            <div class="mod-header">
                <button class="js-modal-close" type="button" aria-label="Fermer"><i class="far fa-times-circle"></i></button>
                <h1 id="modal-title">Changer les couleurs</h1>
            </div>
            <?php
            $ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';
            include $ROOT_DIR . 'list-colors/color-category-form.php';
            ?>
            </div>
    </aside>
    
