<?php

function EstableceDatosPartida() {
    $palabras = array(
        "REUTILIZAR",
        "REDUCIR",
        "RECICLAR",
        "ECOLOGIA",
        "CONTAMINACION",
        "GRIS",
        "VERDE",
        "AMARILLO",
        "RESIDUO",
        "COMPOST");
    $definiciones = array(
        "De la regla de las 3 Rs, ¿cual es la segunda?",
        "De la regla de las tres 3 Rs, ¿cuál es la primera?",
        "De la regla de las tres 3 Rs, ¿cuál es la tercera?",
        "¿Cuál es Ciencia que estudia las relaciones entre los seres vivos y de éstos con el 
            medio físico-químico que les rodea?",
        "¿Qué es alteración nociva de la naturaleza, como consecuencia de la 
            descarga de residuos al medio ambiente?",
        "¿Qué es alteración nociva de la naturaleza, como consecuencia de la 
            descarga de residuos al medio ambiente?",
        "¿Qué color tiene el contenedor en el que se tira el vidrio?",
        "¿Qué color tiene el contenedor en el que se tira el plástico, el tetrabrik y el papel 
            de aluminio?",
        "Material resultante de un proceso de fabricación, transformación, consumo o 
            limpieza, cuando su poseedor o productor lo destina al abandono.",
        "Degradación de la materia orgánica para formarla en un compuesto 
            químicamente estable.");
    $imagenes = array(
        "./imagenes/uno.png",
        "./imagenes/dos.png",
        "./imagenes/tres.png",
        "./imagenes/cuatro.png");

    $indiceAleatorioPalabras = rand(0, count($palabras) - 1);
    $_SESSION['definicion'] = $definiciones[$indiceAleatorioPalabras];
    $_SESSION['palabra'] = str_split($palabras[$indiceAleatorioPalabras]);
    $_SESSION['imagen'] = $imagenes[$indiceAleatorioPalabras];
    $_SESSION['acertadas'] = array();
    $_SESSION['falladas'] = array();
    $_SESSION['jugando'] = true;
}
