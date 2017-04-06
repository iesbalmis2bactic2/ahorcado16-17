<?php
include 'definition.php';
include 'formularioEentradaLetra.php';


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

    MuestraDefinicion($definicion, $imagen);
    MostrarFormulario();
    echo "Palabra: ";
    for ($index = 0; $index < count($palabra); $index++) {
        $letra = $palabra[$index];
        if (array_search($letra, $letrasAcertadas) === false) {
            echo "_ ";
        } else {
            echo $letra." ";
        }
    }
    echo "<br />";
    echo "Falladas: ";
    for ($index = 0; $index < count($letrasFalladas); $index++) {
        $letra = $letrasFalladas[$index];
        echo "{$letra}, ";
    }
    echo "<br />";
    $imagenFallo=MuestraImagenesFallos($letrasFalladas);
    
    echo $imagenFallo;

    ?>
        </div>
    </div>
<?php
    
}

