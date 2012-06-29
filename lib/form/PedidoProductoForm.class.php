<?php

/**
 * PedidoProducto form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class PedidoProductoForm extends BasePedidoProductoForm
{
  public function configure()
  {
      $this->widgetSchema['pedido_id']= new sfWidgetFormPropelChoice(array('model' => 'Pedido'));
      $this->widgetSchema['producto_id'] = new sfWidgetFormPropelChoice(array('model' => 'Producto'));
  }
}
