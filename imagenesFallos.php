<?php                     
function MuestraImagenesFallos($letrasFalladas)
{
?>
 <div class="row filasNoLeft"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-sg-12 columnas">    
<?php 
        $numero = count($letrasFalladas);
        $rutaImagenFallo = "./imagenes/fallos/santi/s{$numero}.png";
        echo '<img width="384px" height ="216px" src="'.$rutaImagenFallo.'" />';
?>
    </div>
 </div>
<?php 
}
?>
