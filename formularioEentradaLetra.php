<?php

function MostrarFormulario() {
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Introduce una letra<input name="letra" value="" type="text"><br />
        <input name="aceptar" value="Aceptar" type="submit">
    </form>
    <?php
}

?>

