<?php
include 'estadoJuego.php';

function EstaLetraEnIntroducidas($letra, $letrasAcertadas, $letrasFalladas) {
    $letraIntroducida = !(array_search($letra, $letrasAcertadas) == false && array_search($letra, $letrasFalladas) == false);
    return $letraIntroducida;
}

function ComprobarPalabraAcertada($palabra, $letrasAcertadas) {
    $esta = true;
    for ($i = 0; $i < count($palabra); $i++) {
        if (array_search($palabra[$i], $letrasAcertadas) === false) {
            $esta = false;
            break;
        }
    }
    return $esta;
}

function ComprobarFinJuego(
        $palabra, $letrasAcertadas, $letrasFalladas,
        &$finDeJuego, &$hasGanado) {
    $seHanIntroducidoTodasLasLetrasDeLaPalabra = ComprobarPalabraAcertada($palabra, $letrasAcertadas);
    $finDeJuego = false;    
    $hasGanado = false;
    if ($seHanIntroducidoTodasLasLetrasDeLaPalabra === true && count($letrasFalladas) < 5) {
        $finDeJuego = true;
        $hasGanado=true;
    } elseif (count($letrasFalladas) > 5) {
        $finDeJuego = true;
    }
}

function EstableceDatosPartida() {
    $palabras = array(
        "UNO",
        "DOS",
        "TRES",
        "CUATRO");
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

    $indiceAleatorioPalabras = rand(0, count($palabras) - 1);
    $_SESSION['definicion'] = $definiciones[$indiceAleatorioPalabras];
    $_SESSION['palabra'] = str_split($palabras[$indiceAleatorioPalabras]);
    $_SESSION['imagen'] = $imagenes[$indiceAleatorioPalabras];
    $_SESSION['acertadas'] = array();
    $_SESSION['falladas'] = array();
    $_SESSION['jugando'] = true;
}

function Principal() {
    session_start();
    $finDeJuego = false;
    $hasGanado = false;
    if (isset($_SESSION['jugando']) === false) {
        EstableceDatosPartida();
        $mensajeParaUsuario = "";
    } else {
        $_GET['letra'] = strtoupper($_GET['letra']);
        if ($_GET['letra'] == "") { 
            $mensajeParaUsuario = "No has introducido nada :(";
        } else {
            $letraIntroducida = EstaLetraEnIntroducidas($_GET['letra'], $_SESSION['acertadas'], $_SESSION['falladas']);
            if ($letraIntroducida === true) {
                $mensajeParaUsuario = "Esta letra ya está introducida";
            } else {
                $mensajeParaUsuario = "";
                if (array_search($_GET['letra'], $_SESSION['palabra']) !== false) {
                    $_SESSION['acertadas'][] = $_GET['letra'];
                } else {
                    $_SESSION['falladas'][] = $_GET['letra'];
                }
            }

            ComprobarFinJuego(
                 $_SESSION['palabra'], $_SESSION['acertadas'], $_SESSION['falladas'],
                 $finDeJuego, $hasGanado);
        }
    }

    if ($finDeJuego == false)
    {
        MuestraEstadoDelJuego(
        $_SESSION['definicion'], $_SESSION['imagen'], $_SESSION['palabra'], $_SESSION['acertadas'], $_SESSION['falladas']);
    }
    else {
        if ($hasGanado == true)
        {
            echo "<p>Has Ganado</p>";
            session_destroy();
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <input name="aceptar" value="Volver a jugar" type="submit">
            </form>
            <?php
        }
        else
        {
            $palabrafinal = implode($_SESSION['palabra']);
            echo "<p>Has Perdido, la palabra era $palabrafinal</p>";
            session_destroy();
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <input name="aceptar" value="Volver a jugar" type="submit">
            </form>
            <?php
        }
    }
}
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
