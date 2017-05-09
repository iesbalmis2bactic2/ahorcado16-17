<?php
function MostrarFallos($letrasFalladas)
{
?>
<div class="row filas">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 texto">
        Fallos:
    </div>
<?php
        for ($index = 0; $index < count($letrasFalladas); $index++) 
        {
            echo '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 letra texto fallo">';
            $letra = $letrasFalladas[$index];
            echo "{$letra}";
            echo '</div>';
        }
?>
</div>    
<?php
}
