<?php
function MuestraDefinicion($definicion, $imagen)
{
?>    
    <div class="row filas"> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-sg-12 columnas"> 
            <img width ="250px" class="center-block" src ="<?php echo $imagen ?>" />
        </div>
    </div>
    <div class="row filas "> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-sg-12 columnas"> 
            <?php echo $definicion ?>                
        </div>
    </div>
<?php
}
?>
