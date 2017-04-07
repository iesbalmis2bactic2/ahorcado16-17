<?php
include 'definition.php';
include 'formularioEentradaLetra.php';
include 'ImagenesFallos.php';
include 'palabra.php';
include 'fallos.php';

function MostrarFormulario() {
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Introduce una letra: <input name="letra" value="" type="text"><br />
        <input name="aceptar" value="Aceptar" type="submit">
    </form>
    <?php
}

function MuestraImagenesFallos($letrasFalladas)
{
    $numero= count($letrasFalladas);
 $imagenesFallos= array(
        "./imagenFallo/cero.png",
        "./imagenFallo/uno.png",
        "./imagenFallo/dos.png",
        "./imagenFallo/tres.png",
        "./imagenFallo/cuatro.png",
        "./imagenFallo/cinco.png",
        "./imagenFallo/seis.png");
 
 $imagenFallo=$imagenesFallos[$numero];
 
 return $imagenFallo;
 
}

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

