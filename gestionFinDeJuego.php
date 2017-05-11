<?php
function gestionaFinDeJuego($hasGanado)
{       
        $_SESSION['jugando'] = false;      
        if ($hasGanado == true)
            header('Location: ganar.php');
        else
            header('Location: perder.php');
}
