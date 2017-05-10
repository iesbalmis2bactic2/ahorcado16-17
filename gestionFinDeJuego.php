<?php
function gestionaFinDeJuego($hasGanado)
{
        if ($hasGanado == true)
        {
            echo "<p>Has Ganado</p>";
            $_SESSION['jugando'] = false;      
        }
        else
        {
            $palabrafinal = implode($_SESSION['palabra']);
            echo "<p>Has Perdido, la palabra era $palabrafinal</p>";
            $_SESSION['jugando'] = false;      
        }
?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    <input name="aceptar" value="Volver a jugar" type="submit">
    </form>
<?php
}
