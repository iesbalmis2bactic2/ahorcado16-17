<?php

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
