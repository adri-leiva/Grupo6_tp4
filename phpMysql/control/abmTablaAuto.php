<?php
class AbmTablaAuto{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return TablaAuto
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('patente',$param) and array_key_exists('marca',$param) and array_key_exists('modelo',$param) and array_key_exists('nroDni',$param)){
            $obj = new TablaAuto();
            $obj->setear($param['patente'], $param['marca'],$param['modelo'],$param['nroDni']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Tabla
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['Patente']) ){
            $obj = new TablaAuto();
            $obj->setear($param['Patente'], null);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['Patente'] =null;
        $elObjtTabla = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($elObjtTabla!=null and $elObjtTabla->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjeto($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    function cambiarDuenio($datos)
    {
        $objAuto = new TablaAuto();
        $objAuto->setPatente($datos['patente']);
        $resp = false;
        if ($objpAuto->cargar()) {
            $objAuto->setDuenio($datos['dni']);
            $resp = $objAuto->modificar();
        }
        return $resp;
    }

    /**
     * permite buscar un objeto 
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['Patente']))
                $where.=" and Patente =".$param['Patente'];
            if  (isset($param['descrip']))
                 $where.=" and descrip ='".$param['descrip']."'";
        }
        $arreglo = TablaAuto::listar($where);  
        return $arreglo;
            
            
      
        
    }
    


}
?>