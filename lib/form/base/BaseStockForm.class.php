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
      'producto_id'     => new sfWidgetFormInputHidden(),
      'cantidad_actual' => new sfWidgetFormInputText(),
      'cantidad_minima' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'producto_id'     => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id', 'required' => false)),
      'cantidad_actual' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'cantidad_minima' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
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
