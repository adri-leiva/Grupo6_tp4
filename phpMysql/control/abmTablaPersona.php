<?php
class AbmTablaPersona{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return TablaPersona
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('Patente',$param) and array_key_exists('descript',$param)){
            $obj = new TablaPersona();
            $obj->setear($param['Patente'], $param['descript']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return TablaPersona
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['Patente']) ){
            $obj = new TablaPersona();
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

    public function existePersona($datos)
    {
        $objPersona = new TablaPersona();
        $resp = false;
        
        if (!is_null($datos)) {
            echo "hay per";
            $objPersona->setDni($datos['dni']);
            $resp = $objPersona->cargar();
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
            if  (isset($param['nroDni']))
            $where.=" and nroDni =".$param['nroDni'];
        if  (isset($param['Apellido']))
            $where.=" and Nmobre =".$param['Apellido'];
        if  (isset($param['fechaNac']))
            $where.=" and fechaNac =".$param['fechaNac'];
        if  (isset($param['Telefono']))
            $where.=" and Telefono =".$param['Telefono'];
        if  (isset($param['Domicilio']))
            $where.=" and Domicilio =".$param['Domicilio'];
        }
        $arreglo = TablaPersona::listar($where);  
        return $arreglo;
    }

    public function personaExiste($dni){
        $arreglo = new TablaPersona();
       $arreglo->buscar($dni['nroDni']);
        $existe=false;
        print_r($arreglo);
        if(empty($arreglo)){
            echo "existe";
            $existe=false;

        }else{
            echo "no existe";
            $existe=true;
        }

    return $existe;
    }
    
}
?>