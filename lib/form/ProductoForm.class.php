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

        if($this->isNew())
            $child = new Stock();
        else
            $child = $this->getObject()->getStock();
        $child->Parent = $this->getObject();
        $this->getObject()->setStock($child);
        
        $form2 = new StockForm($child);

        $this->embedForm('stock', $form2);

        //esto anda,,, pasa q no guarda en la tabla stock pq no existe
        // la referencia de un producto q aun no esta creado
    }
}
