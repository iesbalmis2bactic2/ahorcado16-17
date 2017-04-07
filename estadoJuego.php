<?php
include 'definition.php';
include 'formularioEentradaLetra.php';
include 'ImagenesFallos.php';
include 'palabra.php';
include 'fallos.php';

function MuestraEstadoDelJuego(
$definicion, $imagen, $palabra, $letrasAcertadas, $letrasFalladas) {

 ?>
<div class="container">
    <div class="row">
<?php

    $MaxNumFallos = 6;
        ?><div class="col-md-5"><?php
            MuestraDefinicion($definicion, $imagen);
        ?></div><?php
        ?><div class="col-md-7"><?php
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

