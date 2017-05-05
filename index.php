<?php
include 'datosPartida.php';
include 'estadoJuego.php';
include 'gestionFinDeJuego.php';

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

function Principal() {
    session_start();
    $finDeJuego = false;
    $hasGanado = false;
    if (isset($_SESSION['jugando']) === false) {
        EstableceDatosPartida();
        $mensajeParaUsuario = "";
    } elseif (isset($_GET['letra']) === true) {
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
                        $_SESSION['definicion'], 
                        $_SESSION['imagen'], 
                        $_SESSION['palabra'], 
                        $_SESSION['acertadas'], 
                        $_SESSION['falladas']);
    }
    else {
        gestionaFinDeJuego($hasGanado);
    }
}
?>

<!DOCTYPE>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
    <body class="imgFondo">
<?php
Principal();
?>
    </body>
</html>
