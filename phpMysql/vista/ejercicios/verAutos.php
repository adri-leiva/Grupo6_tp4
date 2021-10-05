<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");

$objAbmAutos = new AbmTablaAuto();
$objAbmPersonas = new AbmTablaPersona();
$listaAutos = $objAbmAutos->buscar(null);
$listaPersonas = $objAbmPersonas->buscar(null);

?>
 
 <main class="px-5">
    <h1>AUTOS</h1>
    <p class="lead">
    <table >
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
                    if($dni == $objetos->getObjPersona()){
                        echo 
                        '<tr>
                            <td>'.$objetos->getPatente().'</td>
                            <td>'.$objetos->getMarca().'</td>
                            <td>'.$objetos->getModelo().'</td>
                            <td>'.$objetos->getObjPersona().'</td>
                            <td>'.$nombre.'</td>
                            <td>'.$apellido.'</td>
                        </tr>';
                    }
                }
            }
        }else{
            echo 'No hay autos cargados.';
        }
        ?>
        </table>
        </p>
    
    </main>      

   
        
        <?php
               
        include_once("../estructura/pie.php");
        ?>
        
        