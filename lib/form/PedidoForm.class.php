<?php

/**
 * Pedido form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class PedidoForm extends BasePedidoForm
{
  public function configure()
  {
      $this->widgetSchema['fecha_pedido']= new sfWidgetFormInputHidden();
      
      $this->validatorSchema['fecha_pedido']->setOption("required", false);
      unset($this['pedido_producto_list']);
      
      $this->widgetSchema->setLabels(array(

              'estado' => 'Pedido activo?',
          ));
      
      $this->embedRelation('PedidoProducto');
  }
}
