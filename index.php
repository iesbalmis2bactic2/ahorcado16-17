<?php
function EstaLetraEnIntroducidas($letra, $letrasAcertadas,$letrasFalladas)
{
    if (array_search($letra, $letrasAcertadas)==false  && 
        array_search($letra, $letrasFalladas)==false)
        $esta=false;
    else
        $esta=true;
   
    return $esta;
}

function PedirLetra( $letrasAcertadas, $letrasFalladas)
{
    do
    {
        $letra=  strtoupper($letra);
        $esta= EstaLetraEnIntroducidas($letra, $letrasAcertadas, $letrasFalladas);
    }
    while($esta==true);
    
    return $letra;
}

function ComprobarPalabraAcertada($palabra, $letrasAcertadas)
{
    $esta=true;
    for ($i = 0; $i < count($palabra); $i++) 
    {   
        if (array_search($palabra[$i], $letrasAcertadas)===false)
        {
            $esta=false;
            break;
        }
    }
    return $esta;
}

function ComprobarFinJuego($palabra, $letrasFalladas, $letrasAcertadas, $MaxNumFallos)
{
    $estaTodaLaPalabraAcertada=ComprobarPalabraAcertada($palabra, $letrasAcertadas);
    $finDeJuego=false;
    if($estaTodaLaPalabraAcertada===true && count($letrasFalladas)<$MaxNumFallos)
    {
        $finDeJuego=true;
        echo "Has ganado";
    }
    elseif (count($letrasFalladas)>$MaxNumFallos)
    {
        $palabrafinal= implode($palabra);
        $finDeJuego=true;
        echo "Has perdido, has llegado al máximo de fallos, la palabra era $palabrafinal";
    }

    return $finDeJuego;
}

function MostrarFormulario()
{
    ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Introduce una letra: <input name="letra" value="" type="text"><br />
        <input name="aceptar" value="Aceptar" type="submit">
        </form>
    <?php
}

function MuestraEstadoDelJuego($definicion, $imagen, $palabra, $letrasAcertadas, $letrasFalladas)
{
    echo "Definicion: $definicion <br />";
    echo "Imagen: $imagen <br />";
    echo "Palabra: ";
    for ($index=0; $index < count($palabra); $index++)
    {
        $letra=$palabra[$index];
        if (array_search($letra, $letrasAcertadas)===false)
        {
            echo "_ ";
        }
        else
        {
            echo $letra." ";
        }
    }
    echo "<br />";
    echo "Falladas: ";
    for ($index = 0; $index < count($letrasFalladas); $index++) 
    {
        $letra=$letrasFalladas[$index];
        echo "$letra, ";
    }
    echo "<br />";
}

function Jugar($definicion, $imagen, $palabra, $letrasAcertadas, $letrasFalladas)
{
    $MaxNumFallos = 4;                
    MuestraEstadoDelJuego($definicion, $imagen, $palabra, $letrasAcertadas, $letrasFalladas);
    MostrarFormulario();    
}

function EstableceDatosPartida()
{
    $palabras = array(
                    "uno", 
                    "dos", 
                    "tres", 
                    "cuatro");
    $definiciones = array(
                    "definicion uno", 
                    "definicion dos", 
                    "definicion tres", 
                    "definicion cuatro");
    $imagenes = array(
                    "./imagenes/uno.png", 
                    "./imagenes/dos.png", 
                    "./imagenes/tres.png", 
                    "./imagenes/cuatro.png");
    
    $indiceAleatorioPalabras = rand(0, count($palabras)-1);
    $_SESSION['definicion'] = $definiciones[$indiceAleatorioPalabras];
    $_SESSION['palabra'] = $palabras[$indiceAleatorioPalabras];
    $_SESSION['imagen'] = $imagenes[$indiceAleatorioPalabras];    
    $_SESSION['acertadas'] = array();
    $_SESSION['falladas'] = array();
    $_SESSION['jugando'] = true;
}

function Principal()
{
    session_start();    
    if (isset($_SESSION['jugando']) === false)
        EstableceDatosPartida();
    else
    {
        /*
            No es la primera vez que se carga la página.
            Tendré que:
         *     Si el juego a terminado
         *          Tengo que saberlo para ver que muestro (Pantalla de has perdido o de has ganado).     
         *     Si no
         *          Tomar la letra del edit y si no hay mensaje aopropiado.
         *          Si es una letra válida
         *              Ver si está en acertadas o falladas.
         *          sino
         *              mensaje apropiado
                
         */
        $mensajeParaUsuario = "Lo que le digo al usuario tras haber procesado la entrada.";
    }
    
    Jugar(
        $_SESSION['definicion'], $_SESSION['imagen'], 
        $_SESSION['palabra'], $_SESSION['acertadas'], 
        $_SESSION['falladas']);    
}
?>

<!DOCTYPE>
<html>
<head></head>
<body>
    <?php Principal(); ?>
</body>
</html>
