<?php

/**
 * EncabezadoPedido form base class.
 *
 * @method EncabezadoPedido getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEncabezadoPedidoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'proveedor_id' => new sfWidgetFormPropelChoice(array('model' => 'Proveedor', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'proveedor_id' => new sfValidatorPropelChoice(array('model' => 'Proveedor', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('encabezado_pedido[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EncabezadoPedido';
  }


}
