
    <?php

include_once("../estructura/cabecera.php");
?>
    
    <h1>Buscar auto</h1>

    <form name="buscar" class="was-validated" id="buscar" method="post" action="../accion/accionBuscarAuto.php">
        ingrese la patende del auto que desea buscar <input class="form-control" type="text" name="patente" required>
        <div class="invalid-feedback">Ingrese una patente.</div><br>
        <input type="submit" class="btn btn-primary" value="enviar">
    </form>
    <?php


include_once("../estructura/pie.php");
?>

