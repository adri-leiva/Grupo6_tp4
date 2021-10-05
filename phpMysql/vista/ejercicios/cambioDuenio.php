<?php
include_once("../estructura/cabecera.php");
?>
<div class="lead">
        <div class="text-center p-3">
            <h3>Cambio de dueño</h3>
        </div>
        <form id="formPersona" class="was-validated" name="formPersona" method="post" action="../accion/accionCambioDuenio.php" novalidate>
            <div class="form-floating mb-3">
                <input class="form-control" id="dni" name="dni" type="text" placeholder="DNI" required>
                <label for="dni">DNI</label>
                <div class="invalid-feedback">Ingrese dni.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="patente" name="patente" type="text" placeholder="Patente" required>
                <label for="patente">Patente</label>
                <div class="invalid-feedback">Ingrese una patente.</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Cambiar</button>
            </div>
        </form>
    </div>
    <?php
               
        include_once("../estructura/pie.php");
        ?>
        