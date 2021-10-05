
<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");
?>


<h1>Persona</h1>

<table border="1">
<?php 

$datos = data_submitted();
$objPersona = new AbmTablaPersona();
$listaPersonas = $objPersona->buscar(null);
$encontro = false;
    if(!empty($datos['dni'])){
        if(count($listaPersonas)>0){
            foreach($listaPersonas as $objPersona){
                $dni = $objPersona->getDni();
                if($dni == $datos['dni']){
                    echo  
                    '<tr>
                        <th>Dni</th><th>Apellido</th><th>Nombre</th><th>Fecha Nacimiento</th><th>Telefono</th><th>Domicilio</th>
                    </tr>
                    <tr>
                        <td>'.$objPersona->getDni().'</td>
                        <td>'.$objPersona->getApellido().'</td>
                        <td>'.$objPersona->getNombre().'</td>
                        <td>'.$objPersona->getFechaNac().'</td>
                        <td>'.$objPersona->getTelefono().'</td>
                        <td>'.$objPersona->getDomicilio().'</td>
                        <td><a href="../ejercicios/editarPersona.php">editar</a></td>
                    </tr>';
                    $encontro = true;
                }
                    
                
            }
        }
    }
    if(!$encontro){
        echo 'No se encontro persona.';
    }
?>
</table>


<?php


include_once("../estructura/pie.php");
?>