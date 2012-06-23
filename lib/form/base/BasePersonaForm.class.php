<?php

/**
 * Persona form base class.
 *
 * @method Persona getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nro_doc'          => new sfWidgetFormInputHidden(),
      'nom_apellido'     => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
      'e_mail'           => new sfWidgetFormInputText(),
      'localidad_id'     => new sfWidgetFormPropelChoice(array('model' => 'Localidad', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'nro_doc'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getNroDoc()), 'empty_value' => $this->getObject()->getNroDoc(), 'required' => false)),
      'nom_apellido'     => new sfValidatorString(array('max_length' => 45)),
      'fecha_nacimiento' => new sfValidatorDate(),
      'e_mail'           => new sfValidatorString(array('max_length' => 30)),
      'localidad_id'     => new sfValidatorPropelChoice(array('model' => 'Localidad', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }


}
