<div id="color-choose">

    <form action="../list-colors/color-status-treat.php" method="post">

    <ul>
            <li>
                <div class="category-color" id="category-personnel">
                    <label for="todo-colorchoose">A faire</label>
                    <input type="color" name="todo-colorchoose" id="personnel-colorchoose" value=<?php echo getColorFromStatus(1)?>>
                </div>
            </li>

            
            <li>
                <div class="category-color" id="category-personnel">
                    <label for="pending-colorchoose">En cours</label>
                    <input type="color" name="pending-colorchoose" id="personnel-colorchoose" value=<?php echo getColorFromStatus(2)?>>
                </div>
            </li>

            
            <li>
                <div class="category-color" id="category-personnel">
                    <label for="to_validate-colorchoose">En validation</label>
                    <input type="color" name="to_validate-colorchoose" id="personnel-colorchoose" value=<?php echo getColorFromStatus(3)?>>
                </div>
            </li>
            

            <li>
                <div class="category-color" id="category-personnel">
                    <label for="done-colorchoose">Termine</label>
                    <input type="color" name="done-colorchoose" id="personnel-colorchoose" value=<?php echo getColorFromStatus(4)?>>
                </div>
            </li>

            <li>
                <div class="category-color" id="category-personnel">
                    <label for="abandoned-colorchoose">Abandon</label>
                    <input type="color" name="abandoned-colorchoose" id="personnel-colorchoose" value=<?php echo getColorFromStatus(5)?>>
                </div>
            </li>
        </ul>

        <input type="submit" value="Changer les couleurs" id="submit-color-status"> 
    </form>    
</div>


