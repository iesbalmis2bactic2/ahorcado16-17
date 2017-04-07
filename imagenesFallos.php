<?php

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
$imagenFallo=MuestraImagenesFallos($letrasFalladas);
    
    echo $imagenFallo;
