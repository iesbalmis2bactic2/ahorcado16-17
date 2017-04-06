<?php
include 'definition.php';

function MuestraEstadoDelJuego(
$definicion, $imagen, $palabra, $letrasAcertadas, $letrasFalladas) {
    $MaxNumFallos = 6;

    MuestraDefinicion($definicion, $imagen);
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
    MostrarFormulario();
    $imagenFallo=MuestraImagenesFallos($letrasFalladas);
    
    echo $imagenFallo;
    
}

