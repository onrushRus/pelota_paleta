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
      'encabezado_pedido_id' => new sfWidgetFormInputHidden(),
      'producto_id'          => new sfWidgetFormInputHidden(),
      'cantidad'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'encabezado_pedido_id' => new sfValidatorPropelChoice(array('model' => 'EncabezadoPedido', 'column' => 'id', 'required' => false)),
      'producto_id'          => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id', 'required' => false)),
      'cantidad'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
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
