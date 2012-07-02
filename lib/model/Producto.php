<?php



/**
 * Skeleton subclass for representing a row from the 'producto' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Producto extends BaseProducto {
    
    public function getStockCritico($prod) {
        $p = new Stock();
        $p = StockPeer::retrieveByPK($prod);   //Fijate esta gaby pedaso de trolin JAJA
        if ($p !=null){
            if ($p->getCantidadActual() < $p->getCantidadMinima()) {
                return "poco stock";
            } else {
                return "stock normal";
            }
        }else{
            return "Nada Cargado";
        } 
    }
} // Producto
