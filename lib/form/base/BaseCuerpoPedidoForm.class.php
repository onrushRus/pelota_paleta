<?php

/**
 * CuerpoPedido form base class.
 *
 * @method CuerpoPedido getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCuerpoPedidoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'encabezado_pedido_id' => new sfWidgetFormPropelChoice(array('model' => 'EncabezadoPedido', 'add_empty' => false)),
      'producto_id'          => new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => false)),
      'cantidad'             => new sfWidgetFormInputText(),
      'id'                   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'encabezado_pedido_id' => new sfValidatorPropelChoice(array('model' => 'EncabezadoPedido', 'column' => 'id')),
      'producto_id'          => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id')),
      'cantidad'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cuerpo_pedido[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CuerpoPedido';
  }


}
