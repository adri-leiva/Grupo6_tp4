
<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");
?>
 

<h1>Autos</h1>
<table border="1">
<?php 

$datos = data_submitted();
$objAuto = new AbmTablaAuto();
$listaAutos = $objAuto->buscar(null);
$encontro = false;
    if(!empty($datos['patente'])){
        if(count($listaAutos)>0){
            foreach($listaAutos as $objAuto){
                $patente = $objAuto->getPatente();
                if($patente == $datos['patente']){
                    echo  
                    '<tr>
                        <th>Patente</th><th>Marca</th><th>Modelo</th><th>dni Dueño</th>
                    </tr>
                    <tr>
                        <td>'.$objAuto->getPatente().'</td>
                        <td>'.$objAuto->getMarca().'</td>
                        <td>'.$objAuto->getModelo().'</td>
                        <td>'.$objAuto->getObjPersona().'</td>
                    </tr>';
                    $encontro = true;
                }
            }
        }
    }
    if(!$encontro){
        echo 'No se encontro autos.';
    }
?>
</table>


<?php


include_once("../estructura/pie.php");
?>