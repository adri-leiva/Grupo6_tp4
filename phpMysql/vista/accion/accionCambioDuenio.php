<?php
include_once('../../configuracion.php');
include_once("../estructura/cabecera.php");

$datos = data_submitted();
$controller = new AbmTablaAuto();
$controllerPersona = new AbmTablaPersona();
$response = false;
if (empty($datos)) {
    echo "1";
    if ($controllerPersona->existePersona($datos)) {
        echo "entro?";
        $response = $controller->cambiarDuenio($datos);
        echo "2";
    }
}

?>

<div class="container text-center p-5 mt-5">
    <?php
    if ($response) {
        echo "existo!";
    } else {
        echo "error: No se cambio de dueño.";
    }
    ?>
</div>
<?php
include_once("../estructura/pie.php");
?>