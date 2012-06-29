<?php

/**
 * PedidoProducto form base class.
 *
 * @method PedidoProducto getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePedidoProductoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pedido_id'   => new sfWidgetFormInputHidden(),
      'producto_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'pedido_id'   => new sfValidatorPropelChoice(array('model' => 'Pedido', 'column' => 'id', 'required' => false)),
      'producto_id' => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pedido_producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PedidoProducto';
  }


}
