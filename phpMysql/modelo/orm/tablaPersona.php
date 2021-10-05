<?php 
class TablaPersona {
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->nroDni="";
        $this->apellido="";
        $this->nombre="";
        $this->fechaNac="";
        $this->telefono="";
        $this->domicilio="";
        $this->mensajeoperacion ="";
    }
    public function setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio){
        $this->setDni($nroDni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
    }
    
    
    
    public function getDni(){
        return $this->nroDni;
        
    }
    public function setDni($nroDni){
        $this->nroDni = $nroDni;
        
    }
    
    public function getApellido(){
        return $this->apellido;
        
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
        
    }

    public function getNombre(){
        return $this->nombre;
        
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
        
    }
    
    public function getFechaNac(){
        return $this->FechaNac;
        
    }
    public function setFechaNac($fechaNac){
        $this->FechaNac = $fechaNac;

    }

    public function getTelefono(){
        return $this->telefono;
        
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
        
    }

    public function getDomicilio(){
        return $this->domicilio;
        
    }
    public function setDomicilio($domicilio){
        $this->domicilio = $domicilio;
        
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM tabla WHERE NroDni = ".$this->getDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("tablaPersona->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO persona(NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio)
            VALUES('".$this->getDni()."','".$this->getApellido()."','".$this->getNombre()."','".$this->getfechaNac()."','".$this->getTelefono()."','".$this->getDomicilio()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setId($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("tablaPersona->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("tablaPersona->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE persona SET NroDni='".$this->getDni()."', Apellido='".$this->getApellido()."', Nombre='".$this->getNombre()."', fechaNac='".$this->getFechaNac()."', Telefono='".$this->getTelefono()."', Domicilio='".$this->getDomicilio()."' WHERE NroDni=".$this->getDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("tablaPersona->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("tablaPersona->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM persona WHERE NroDni=".$this->getDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("tablaPersona->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("tablaPersona->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM persona ";
        if ($parametro) {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new TablaPersona();
                    $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("tablaPersona->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>