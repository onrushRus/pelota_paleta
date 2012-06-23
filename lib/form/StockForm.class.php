<?php

/**
 * Stock form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class StockForm extends BaseStockForm
{
  public function configure()
  {
	  $this->widgetSchema['producto_id']= new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => false));
  }
}
