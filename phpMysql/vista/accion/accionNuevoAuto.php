<?php 


include_once("../estructura/cabecera.php");

include_once '../../configuracion.php';
$datos = data_submitted();
verEstructura($datos);
$resp = false;
$controlautos = new AbmTablaAuto();


$persona= new AbmTablaPersona();

$encontrar= $persona->existePersona($datos); //retorna true si la persona esta en la base datos



if($encontrar){
    $nuevoauto=$controlautos->alta($datos);
if($nuevoauto){

    echo "se ingreso auto";

}
}else{
    echo "La persona no esta en la base de datos, ingrese los datos del duenio<br>
    
    <a href=#> INGRESAR DATOS DE PROPIETARIO</a>";
    
}



include_once("../estructura/pie.php");

?>