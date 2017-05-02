<?php

function MostrarFormulario() {
    ?>
<div class="row filas ">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <div class="col-lg-3 col-md-3 col-sm-3 col-sg-3 columnas">
            ¡Juega!
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-sg-6 columnas ">
            <input name="letra" value="" type="text">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-sg-3 columnas"> 
            <input name="aceptar" value="Aceptar" type="submit">
        </div>    
    </form>
</div>
    <?php
}
?>

