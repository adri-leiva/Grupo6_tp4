
<?php

include_once("../estructura/cabecera.php");
?>



<main class="px-3">

<h1>NUEVO AUTO</h1>
<p class="lead">
<form  method="post" class="was-validated" action="../accion/accionNuevoAuto.php">
    <div class="row">
    <div class="col py-3 px-lg-5 ">
    DNI</div>
    <div class="col py-3 px-lg-5  ">
    <input id="dni" class="form-control" name ="dni" type="number" required>
    <div class="invalid-feedback">Ingrese un DNI.</div>
    </div></div>
    <div class="row">
    <div class="col py-3 px-lg-5  ">
    Patente
    </div>
    <div class="col py-3 px-lg-5  ">
    <input id="patente" class="form-control" name ="patente" type="text" required>
    <div class="invalid-feedback">Ingrese una patente.</div>
    </div> </div>
    <div class="row">
    <div class="col py-3 px-lg-5  ">
    Marca
    </div>
    <div class="col py-3 px-lg-5  ">
    <input id="marca" class="form-control" name ="marca" type="text" required>
    <div class="invalid-feedback">Ingrese una marca.</div>
    </div></div>
    <div class="row">
    <div class="col py-3 px-lg-5  ">
    Modelo   </div>
    <div class="col py-3 px-lg-5  ">
    <input id="modelo" class="form-control" name ="modelo" type="text" required>
    <div class="invalid-feedback">Ingrese un modelo.</div>
    </div></div>
  
        <div class="col py-3 px-lg-5  ">
   <button class="btn btn-primary" type="submit">Agregar Auto</button>
</div>

</form>
</p>
</main>
<?php


include_once("../estructura/pie.php");
?>

