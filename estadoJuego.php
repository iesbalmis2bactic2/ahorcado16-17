<?php
include 'definition.php';
include 'formularioEentradaLetra.php';
include 'imagenesFallos.php';
include 'palabra.php';
include 'fallos.php';

function MuestraEstadoDelJuego(
$definicion, $imagen, $palabra, $letrasAcertadas, $letrasFalladas) {

 ?>
<div class="container contorno ">
    <div class="row  ">
<?php

    $MaxNumFallos = 6;
        ?><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><?php
            MuestraDefinicion($definicion, $imagen);
        ?></div><?php
        ?><div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"><?php
            MostrarFormulario();
            MostrarPalabra($palabra, $letrasAcertadas);
            MostrarFallos($letrasFalladas);
            MuestraImagenesFallos($letrasFalladas);
        ?></div><?php
    ?>
    </div>
</div>
<?php
    
}

