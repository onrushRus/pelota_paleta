<?php

/**
 * Producto form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class ProductoForm extends BaseProductoForm
{
  public function configure()
  {
		//$this->widgetSchema['id']= new sfWidgetFormInputText();
		
		parent::configure();       
 
        $child = new Stock();
        $child->Parent= $this->getObject();
 
        $form2 = new StockForm($child);
 
        $this->embedForm('child', $form2);
        
       //esto anda,,, pasa q no guarda en la tabla stock pq no existe
       // la referencia de un producto q aun no esta creado



  }
}
