<?php 



class TablaAuto {
    private $id;
    private $patente;
    private $marca;
    private $modelo;
    private $objPersona;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->patente="";
        $this->marca="";
        $this->modelo="";
        $this->objPersona;
        $this->mensajeoperacion ="";
    }
    public function setear($patente,$marca,$modelo,$objPersona)    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjPersona($objPersona);
    }

    public function getPatente(){
        return $this->patente;
        
    }
    public function setPatente($patente){
        $this->patente = $patente;
        
    }

    public function getMarca(){
        return $this->marca;
        
    }
    public function setMarca($marca){
        $this->marca = $marca;
        
    }

    public function getModelo(){
        return $this->modelo;
        
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
        
    }

    public function getObjPersona(){
        return $this->objPersona;
        
    }
    public function setObjPersona($objPersona){
        $this->objPersona = $objPersona;
        
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
        $sql="SELECT * FROM auto WHERE Patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $persona = new TablaPersona();
                    $dni = $persona->getDni();
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $dni);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("tablaAuto->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $objPersona= new tablaPersona();
        $dni=$objPersona->getDni();
        $sql="INSERT INTO auto(Patente,Marca,Modelo,DniDuenio)
            VALUES('".$this->getPatente()."','".$this->getMarca()."','".$this->getModelo()."','".$dni."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setPatente($elid);
                $resp = true;
            } else {
               // $this->setmensajeoperacion("tablaAuto->insertar: ".$base->getError());
            }
        } else {
           // $this->setmensajeoperacion("tablaAuto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE auto SET Patente='".$this->getPatente()."',Marca='".$this->getMarca()."',Modelo='".$this->getModelo()."',DniDuenio='".$this->getObjPersona()->getDni()."' WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("tablaAuto->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("tablaAuto->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM auto WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("tablaAuto->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("tablaAuto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new TablaAuto();
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("tablaAuto->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>