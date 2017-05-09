<?php

function MostrarFormulario() {
    ?>
<div class="row filas">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">        
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 container-fluid">
            <div class="control-label input-lg">¡Juega! </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <input  class="form-control input-lg" size="1" name="letra" type="text">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
            <input class="center-block btn btn-primary btn-lg" name="aceptar" value="Aceptar" type="submit">
        </div>    
    </form>
</div>
    <?php
}
?>

