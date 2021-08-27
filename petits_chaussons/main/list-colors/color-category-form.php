
<div id="wrap">


    <form action="../list-colors/color-category-treat.php" method="post">

        <ul>
            <li>
                <div class="category-color" id="category-personnel">
                    <label for="personnel-colorchoose">Personnel</label>
                    <input type="color" name="personnel-colorchoose" id="personnel-colorchoose" value=<?php echo getColorFromCategories(1)?>>
                </div>
            </li>

            <li>
                <div id="category-administratif" class="category-color">
                    <label for="administratif-colorchoose">Administratif</label>
                    <input type="color" name="administratif-colorchoose" id="administratif-colorchoose"value=<?php echo getColorFromCategories(2)?>>
                </div>
                
            </li>

            <li>
                <div id="category-commercial" class="category-color">
                    <label for="commercial-colorchoose">Commercial</label>
                    <input type="color" name="commercial-colorchoose" id="commercial-colorchoose"value=<?php echo getColorFromCategories(3)?>>
                </div>
                
            </li>
            

            <li>
                <div id="category-strategique" class="category-color">
                    <label for="strategique-colorchoose">Stratégique</label>
                    <input type="color" name="strategique-colorchoose" id="strategique-colorchoose"value=<?php echo getColorFromCategories(4)?>>
                </div>
            </li>
            <li>
                <div id="category-management" class="category-color">
                    <label for="management-colorchoose">Management</label>
                    <input type="color" name="management-colorchoose" id="management-colorchoose"value=<?php echo getColorFromCategories(5)?>>
                </div>
            </li>
            
            <li>
                <div id="category-marketing" class="category-color">
                    <label for="marketing-colorchoose">Marketing</label>
                    <input type="color" name="marketing-colorchoose" id="marketing-colorchoose"value=<?php echo getColorFromCategories(6)?>>
                </div>  
            </li>
            <li>
                <div id="category-technique" class="category-color">
                    <label for="technique-colorchoose">Technique</label>
                    <input type="color" name="technique-colorchoose" id="technique-colorchoose"value=<?php echo getColorFromCategories(7)?>>
                </div>
                    
            </li>
        </ul>

        <input type="submit" value="Changer les couleurs" id="submit-color-status"> 
    </form>    
</div>
