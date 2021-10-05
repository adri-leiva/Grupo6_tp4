<?php 
include_once '../../configuracion.php';
include_once("../estructura/cabecera.php");
$datos = data_submitted();
$resp = false;
$objTrans = new AbmTablaPersona();
if (isset($datos['accion'])){
    if($datos['accion']=='editar'){
        if($objTrans->modificacion($datos)){
            $resp = true;
        }
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
    
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Tabla</h3>


<?php	
echo $mensaje;
?>
<br><a href="../ejercicios/editarPersona.php">Volver</a><br>
</body>
</html>

<?php
include_once("../estructura/pie.php");
?>