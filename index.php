<?php
function EstaLetraEnIntroducidas($letra, $letrasAcertadas,$letrasFalladas)
{
    if (array_search($GET_['letra'], $letrasAcertadas)==false  && 
        array_search($GET_['letra'], $letrasFalladas)==false)
        $esta=false;
    else
        $esta=true;
   
    return $esta;
}
function pedirLetra($letrasAcertadas, $letrasFalladas){
        echo "<br/>Introduce una letra: ";
        $letra = strtoupper($letraIntroducida);
        $esta = EstaLetraEnIntroducidas($letra, $letrasAcertadas, $letrasFalladas);
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

function ComprobarFinJuego($palabra, $letrasFalladas, $letrasAcertadas)
{
    $estaTodaLaPalabraAcertada=ComprobarPalabraAcertada($palabra, $letrasAcertadas);
    $finDeJuego=false;
    if($estaTodaLaPalabraAcertada===true && count($letrasFalladas)<4)
    {
        $finDeJuego=true;
        echo "Has ganado";
    }
    elseif (count($letrasFalladas)>4)
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

function MuestraEstadoDelJuego(
                    $definicion, $imagen, $palabra, 
                    $letrasAcertadas, $letrasFalladas,
                    $mensajeParaUsuario)
{
    $MaxNumFallos = 4;                
    
    if ($mensajeParaUsuario != "")
    {
        echo "<p>$mensajeParaUsuario</p>";
    }
    
    echo "Definicion: $definicion <br />";
    echo "Imagen: $imagen <br />";
    echo "Palabra: ";
    for ($index=0; $index < count($palabra); $index++)
    {
        $_GET['letra']=$palabra[$index];
        if (array_search($_GET['letra'], $letrasAcertadas)===false)
        {
            echo "_ ";
        }
        else
        {
            echo $_GET['letra']." ";
        }
    }
    echo "<br />";
    echo "Falladas: ";
    for ($index = 0; $index < count($letrasFalladas); $index++) 
    {
        $_GET['letra']=$letrasFalladas[$index];
        echo "{$_GET['letra']}, ";
    }
    echo "<br />";
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
    {
        EstableceDatosPartida();
        $mensajeParaUsuario = "";
    }
    else
    {
        if ($_GET['letra'] = "")
        {
            $mensajeParaUsuario = "No has introducido nada :(";
        }
        else
        {
            $esta = EstaLetraEnIntroducidas($letra, $letrasAcertadas,$letrasFalladas);
            if ($esta===true)
            {
                $mensajeParaUsuario= "Esta letra ya está introducida";
            }
            else
            {
                $mensajeParaUsuario = "";
                if (array_search($_GET['letra'], $palabra) !== false)
                {
                    $letrasAcertadas[] = $_GET['letra'];
                }
                else
                {
                   $letrasFalladas[] = $_GET['letra'];
                }
            }
            
    ComprobarFinJuego($palabra, $letrasFalladas, $letrasAcertadas);
            
        }
        /*
        
 
         *     Si el juego a terminado
         *          Tengo que saberlo para ver que muestro (Pantalla de has perdido o de has ganado).     
         *     Si no
                
         */
        $mensajeParaUsuario = "Lo que le digo al usuario tras haber procesado la entrada.";
    }
    
    MuestraEstadoDelJuego(
        $_SESSION['definicion'], $_SESSION['imagen'], 
        $_SESSION['palabra'], $_SESSION['acertadas'], 
        $_SESSION['falladas'], $mensajeParaUsuario);    
}//Hola so Juan
?>

<!DOCTYPE>
<html>
<head></head>
<body>
    <?php 
    Principal(); 
    ?>
</body>
</html>
