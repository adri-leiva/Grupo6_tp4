<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");
$objAbmTabla = new AbmTablaPersona();
$datos = data_submitted();

$obj =NULL;
if (isset($datos['dni'])){
    $listaTabla = $objAbmTabla->buscar($datos);
    if (count($listaTabla)>0){
        $obj= $listaTabla[0];
        echo $obj;
    }
}
?>
<?php if ($obj!=null){?>
<main class="px-3">

    <h1>EDITAR PERSONA</h1>
    <p class="lead">
        <form  method="post" action="../accion/accionEditarPersona.php">
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                DNI</div>
                <div class="col py-3 px-lg-5  ">
                    <input id="dni" name ="dni" type="text" value="<?php echo $obj->getDni()?>">
                </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                Apellido
            </div>
                <div class="col py-3 px-lg-5  ">
                    <input id="apellido" readonly name ="apellido" type="text" value="<?php echo $obj->getApellido()?>">
                </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                    Nombre
            </div>
            <div class="col py-3 px-lg-5  ">
                <input id="nombre" name ="nombre" type="text" value="<?php echo $obj->getNombre()?>">
            </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                    Fecha Nac
                </div>
                <div class="col py-3 px-lg-5  ">
                    <input id="fecha" name ="fecha" type="text" value="<?php echo $obj->getFechaNac()?>">
                </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                    Telefono
                </div>
                <div class="col py-3 px-lg-5  ">
                <input id="telefono" name ="telefono" type="text" value="<?php echo $obj->getTelefono()?>">
                </div>
            </div>
            <div class="row">
                <div class="col py-3 px-lg-5  ">
                    Domicilio
                </div>
                <div class="col py-3 px-lg-5  ">
                <input id="domicilio" name ="domicilio" type="text" value="<?php echo $obj->getDomicilio()?>">
                </div>
            </div>
            <div class="col py-3 px-lg-5  ">
                <input id="accion" name ="accion" value="editar" type="hidden">
                <button class="btn btn-primary" type="submit">editar Datos</button>
            </div>
        </form>
    </p>
</main>
<?php }else {
    
    echo "<p>No se encontro la persona que desea modificar";
}?>

<?php
include_once("../estructura/pie.php");
?>