<?php
function MostrarFallos($letrasFalladas)
{
?>
<div class="row filas">
    <div class="col-lg-12 col-md-12 col-sm-12 col-sg-12 columnas">  <br/>
<?php
        echo "Falladas: ";
    for ($index = 0; $index < count($letrasFalladas); $index++) {
        $letra = $letrasFalladas[$index];
        echo "{$letra}, ";
    }
?>
    </div>
</div>    
<?php
}
