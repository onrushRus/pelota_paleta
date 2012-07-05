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
  //  $prod = ProductoQuery::create();
    /*
    if($request->isMethod(sfWebRequest::POST)){
        $codProd = $request->getParameter('cod_prod');
        $descripProd = $request->getParameter('descrip_prod');
        $marcaProd = $request->getParameter('marca_prod');
        if(!empty($codProd)){            
            $prod->filterByPrimaryKey($codProd);
        }      
        if (!empty($descripProd)){
            $prod->filterByDescripcionProd('%'.$descripProd.'%', Criteria::LIKE);
        }
        if (!empty($marcaProd)){
            $prod->filterByMarca($marcaProd.'%', Criteria::LIKE);
        } 
    }else{    
      //  $cons->orderById(Criteria::DESC)
      //       ->limit(10);
    }     
     * 
     */     
    
     if($request->isMethod(sfWebRequest::POST)){
        //$this->codProd = $request->getParameter('cod_prod');
         

     }else{
        $paginacion = new sfPropelPager('Producto',10);
        $sql = new Criteria();
        $sql->addAscendingOrderByColumn(ProductoPeer::ID);
        $paginacion->setCriteria($sql);
        $paginacion->setPage($this->getRequestParameter('pag',1));
        $paginacion->init();
        $this->Productos = $paginacion;
     }
    
    
    //$this->Productos = $prod->find();
  }
  
  public function executeVentas_realizadas(sfWebRequest $request)
  {   
      if($request->isMethod(sfWebRequest::POST)){
          //tomo los productos vendidos
          $this->lista_prod = $request->getParameter("prod", array());
        //  $this->lista_prod = $this->getUser()->getListado();
        foreach($this->lista_prod as $id => $item){
              if($item['cant'] > 0){
                  $this->getUser()->addProducto($id,$item['cant']);
                  
                  $stock = StockQuery::create()->findPk($id);
                  $stock->setCantidadActual($stock->getCantidadActual() - $item['cant']);
                  $stock->save();
                  
              }
          }
          
      }else{
         // $this->redirect("http://localhost/pelota_paleta/frontend_dev.php/ventas/carrito");
      }      
  }
  
  public function executeCarrito(sfWebRequest $request)
  {
      
  }
}
