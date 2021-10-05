<?php

include_once("../estructura/cabecera.php");
?>
<main class="px-3">

    <h1>NUEVA PERSONA</h1>
    <p class="lead">
        <form  method="post" class="was-validated" action="../accion/accionNuevaPersona.php">
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                DNI</div>
                <div class="col py-3 px-lg-5  ">
                    <input id="dni" name ="dni" class="form-control" type="number" required>
                    <div class="invalid-feedback">Ingrese un DNI.</div><br>
                </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                Apellido
            </div>
                <div class="col py-3 px-lg-5  ">
                    <input id="apellido" name ="apellido" class="form-control" type="text" required>
                    <div class="invalid-feedback">Ingrese apellido.</div><br>
                </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                    Nombre
            </div>
            <div class="col py-3 px-lg-5  ">
                <input id="nombre" name ="nombre" class="form-control" type="text" required>
                <div class="invalid-feedback">Ingrese nombre.</div><br>
            </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                    Fecha Nac
                </div>
                <div class="col py-3 px-lg-5  ">
                    <input id="fecha" name ="fecha" class="form-control" type="date" required>
                    <div class="invalid-feedback">Ingrese fecha de nacimiento.</div><br>
                </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                    Telefono
                </div>
                <div class="col py-3 px-lg-5  ">
                <input class="form-control" id="telefono" name ="telefono" type="text" required>
                <div class="invalid-feedback">Ingrese un telefono.</div><br>
                </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                    Domicilio
                </div>
                <div class="col py-3 px-lg-5  ">
                <input class="form-control" id="domicilio" name ="domicilio" type="text" required>
                <div class="invalid-feedback">Ingrese una domicilio.</div><br>
                </div>
            </div>
            <div class="col py-3 px-lg-5  ">
                <input id="accion" name ="accion" value="agregar" type="hidden">
                <button class="btn btn-primary" type="submit">Agregar Persona</button>
            </div>
        </form>
    </p>
</main>
<?php


include_once("../estructura/pie.php");
?>

