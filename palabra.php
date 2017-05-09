<?php
function MostrarPalabra($palabra, $letrasAcertadas)
{
?>
<div class="row filas">
<?php
    for ($index = 0; $index < count($palabra); $index++) 
    {    
        $letra = $palabra[$index];
        if (array_search($letra, $letrasAcertadas) === false) 
        {                
?>
             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 columnas">
<?php 
            echo "_"; 
?>
             </div>
<?php
        } else {
?>
             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 columnas">
                <?php echo $letra; ?>
             </div>
 <?php
        }
    }
?>
</div>
<?php
}
?>
