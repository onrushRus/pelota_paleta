<?php

/**
 * PuntosPuesto form base class.
 *
 * @method PuntosPuesto getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePuntosPuestoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'puesto'            => new sfWidgetFormInputText(),
      'puntos_por_puesto' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'puesto'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'puntos_por_puesto' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'PuntosPuesto', 'column' => array('puesto')))
    );

    $this->widgetSchema->setNameFormat('puntos_puesto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PuntosPuesto';
  }


}
