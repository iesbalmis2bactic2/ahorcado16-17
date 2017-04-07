<?php
function MuestraDefinicion($definicion, $imagen)
{
?>    
    <div class="row"> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-sg-12 columnas"> 
            <img src ="<?php echo $imagen ?>" />
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-sg-12 columnas"> 
            <?php echo $definicion ?>                
        </div>
    </div>
<?php
}
?>
