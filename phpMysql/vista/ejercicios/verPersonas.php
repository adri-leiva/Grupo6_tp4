<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");

$objAbmPersonas = new AbmTablaPersona();
$listaPersonas = $objAbmPersonas->buscar(null);

?>
 
 <main class="px-5">
    <h1>PERSONAS</h1>
    <p class="lead">
    <table >
                <?php	
        echo 
        '<tr>
            <th>DOCUMENTO</th><th>APELLIDO</th><th>NOMBRE</th><th>FECHA NAC</th><th>TELEFONO</th><th>DOMICILIO</th>
        </tr>'; 
        if(count($listaPersonas)>0){
            
                foreach($listaPersonas as $objP){
                    $nombre = $objP->getNombre();
                    $apellido = $objP->getApellido();
                    $dni = $objP->getDni();
                    $fechaNac = $objP->getFechaNac();
                    $telefono = $objP->getTelefono();
                    $dom = $objP->getDomicilio();
                    echo 
                    '<tr>
                        <td>'.$dni.'</td>
                        <td>'.$apellido.'</td>
                        <td>'.$nombre.'</td>
                        <td>'.$fechaNac.'</td>
                        <td>'.$telefono.'</td>
                        <td>'.$dom.'</td>
                    </tr>';
                }
        }else{
            echo 'No hay autos cargados.';
        }
        ?>
        </table>
    </p>

    <p>
        <a href="autosPersona.php   ">Autos Persona</a>
    </p>
    
    </main>      

   
        
        <?php
               
        include_once("../estructura/pie.php");
        ?>