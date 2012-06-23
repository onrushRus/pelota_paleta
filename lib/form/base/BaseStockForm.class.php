<?php

/**
 * Stock form base class.
 *
 * @method Stock getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseStockForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'producto_id'     => new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => false)),
      'cantidad_actual' => new sfWidgetFormInputText(),
      'cantidad_minima' => new sfWidgetFormInputText(),
      'id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'producto_id'     => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id')),
      'cantidad_actual' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'cantidad_minima' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('stock[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stock';
  }


}
