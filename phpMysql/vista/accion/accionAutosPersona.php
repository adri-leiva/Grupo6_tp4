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
$objAbmAutos = new AbmTablaAuto();
$objAbmPersonas = new AbmTablaPersona();
$listaAutos = $objAbmAutos->buscar(null);
$listaPersonas = $objAbmPersonas->buscar(null);

?>
<main class="px-5">
    <h1>AUTOS ASOCIADOS</h1>
    <p class="lead">
        <table border=1>    
            <?php	
            echo 
            '<tr>
                <th>Patente</th><th>Marca</th><th>Modelo</th><th>dni Dueño</th><th>Nombre</th><th>Apellido</th>
            </tr>'; 
            if( count($listaAutos)>0 && count($listaPersonas)>0){
                
                foreach ($listaAutos as $objetos) { 
                    foreach($listaPersonas as $objP){
                        $nombre = $objP->getNombre();
                        $apellido = $objP->getApellido();
                        $dni = $objP->getDni();
                        if($dni == $objetos->getObjPersona() && $dni == $datos['dni']){
                            echo 
                            '<tr>
                                <td>'.$objetos->getPatente().'</td>
                                <td>'.$objetos->getMarca().'</td>
                                <td>'.$objetos->getModelo().'</td>
                                <td>'.$objetos->getObjPersona().'</td>
                                <td>'.$nombre.'</td>
                                <td>'.$apellido.'</td>
                            </tr>';
                            $encontro = True;
                        }
                    }
                }
            }
            if(!$encontro){
                echo 'No hay autos cargados.';
            }
            ?>
        </table>
    </p>
    
</main>

<?php


include_once("../estructura/pie.php");
?>