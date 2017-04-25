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
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="public_html/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="public_html/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="public_html/css/main.css">

        <script src="public_html/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
<?php
Principal();
?>
    </body>
</html>
