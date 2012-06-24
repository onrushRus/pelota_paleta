<?php

/**
 * ventas actions.
 *
 * @package    pelota_paleta
 * @subpackage ventas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ventasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $prod = ProductoQuery::create();
    if($request->isMethod(sfWebRequest::POST)){
        $codProd = $request->getParameter('codigo_producto');
        if(!empty($codProd)){            
            $prod->filterByPrimaryKey($codProd);
        }else{
          //  $cons->orderById(Criteria::DESC)
            //     ->limit(10);
        }        
    }else{    
      //  $cons->orderById(Criteria::DESC)
      //       ->limit(10);
    }          
    $this->Productos = $prod->find();
  }
  
  public function executeVentas_realizadas(sfWebRequest $request)
  {   
      if($request->isMethod(sfWebRequest::POST)){
          //tomo los productos vendidos
          $this->lista_prod = $request->getParameter("ventas_prod", array());
          
      }
      //$stock = new Stock();
      //$stock = StockPeer::retrieveByPK($id_producto);   //Fijate esta gaby pedaso de trolin JAJA
      //$stock->getCantidadActual()-cantidad;
      
      
  }
}
