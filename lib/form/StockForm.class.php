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
      unset($this['producto_id']);
//	  $this->widgetSchema['producto_id']= new sfWidgetFormInputText();
//	   $this->validatorSchema['producto_id'] = new sfValidatorInteger();
//	   $this->widgetSchema['producto_id']->setLabel('aki ingresar el codigo del nuevo prodcuto, 
//	   pero esta mal pq no sabes q nuevo codigo va a tener');
	 //$this->widgetSchema['producto_id']= new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => false));
      
      $this->validatorSchema['cantidad_minima']->setOption('min', 0);
      $this->validatorSchema['cantidad_minima']->setMessage('min', 'La cantidad deve ser mayor a 0');
      $this->validatorSchema['cantidad_minima']->setOption('max', 1000);
      $this->validatorSchema['cantidad_minima']->setMessage('max', 'La cantidad deve ser menor a 500');
      
      $this->validatorSchema['cantidad_actual']->setOption('min', 0);
      $this->validatorSchema['cantidad_actual']->setMessage('min', 'La cantidad deve ser mayor a 0');
      $this->validatorSchema['cantidad_actual']->setOption('max', 1000);
      $this->validatorSchema['cantidad_actual']->setMessage('max', 'La cantidad deve ser menor a 10000');
      
      $this->widgetSchema->setLabels(array(
            'cantidad_minima' => 'Cantidad mínima',
        ));
  }
}
