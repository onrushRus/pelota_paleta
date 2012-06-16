<?php

/**
 * Localidad form base class.
 *
 * @method Localidad getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLocalidadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombre_loc'   => new sfWidgetFormInputText(),
      'cod_postal'   => new sfWidgetFormInputText(),
      'provincia_id' => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre_loc'   => new sfValidatorString(array('max_length' => 40)),
      'cod_postal'   => new sfValidatorString(array('max_length' => 10)),
      'provincia_id' => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('localidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Localidad';
  }


}
