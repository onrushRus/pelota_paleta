<?php

/**
 * Torneo form base class.
 *
 * @method Torneo getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTorneoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'anio'        => new sfWidgetFormInputText(),
      'nombre'      => new sfWidgetFormInputText(),
      'tipo_torneo' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'anio'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'nombre'      => new sfValidatorString(array('max_length' => 45)),
      'tipo_torneo' => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('torneo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Torneo';
  }


}
