<?php
function gestionaFinDeJuego($hasGanado)
{
        if ($hasGanado == true)
        {
            echo "<p>Has Ganado</p>";
            session_destroy();
        }
        else
        {
            $palabrafinal = implode($_SESSION['palabra']);
            echo "<p>Has Perdido, la palabra era $palabrafinal</p>";
            session_destroy();
        }
?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    <input name="aceptar" value="Volver a jugar" type="submit">
    </form>
<?php
}
