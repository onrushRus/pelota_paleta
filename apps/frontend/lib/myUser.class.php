<?php

class myUser extends sfBasicSecurityUser
{
    protected $lista_producto = array();
    
    public function getListado(){
        return $this->lista_producto;
    }
    
    public function addProducto($id, $cant){
        //$this->lista_producto[$id] = $cant;
        
        $this->lista_producto[$id] = $cant;
       
    }
    /*
    public function setAttribute($id, $cant) {   
        $this->aux = array($id => $cant);
        
        return $this->setAttribute('aux', $this->getListado());        
    }*/
}
