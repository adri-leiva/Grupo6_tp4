<?php

include_once("../estructura/cabecera.php");
?>

<h1>Buscar Autos de Persona</h1>

<form name="buscar" class="was-validated" id="buscar" method="post" action="../accion/accionAutosPersona.php">
    ingrese DNI de la persona que busca <input type="number" class="form-control" name="dni" required>
    <div class="invalid-feedback">Ingrese un DNI.</div><br>
    <input type="submit"class="btn btn-primary" value="enviar">
</form>
<?php


include_once("../estructura/pie.php");
?>
