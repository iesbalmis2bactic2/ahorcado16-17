<?php                     
function MuestraImagenesFallos($letrasFalladas)
{
?>
 <div class="row filas"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 columnas">    
<?php 
        $numero = count($letrasFalladas) + 1;
        $rutaImagenFallo = "./imagenes/fallos/buenas/imag{$numero}.png";
        echo '<img width ="360px" class="center-block" src="'.$rutaImagenFallo.'" />';
?>
    </div>
 </div>
<?php 
}
?>
