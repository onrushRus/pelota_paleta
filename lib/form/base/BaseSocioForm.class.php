<?php

/**
 * Socio form base class.
 *
 * @method Socio getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSocioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_nro_doc' => new sfWidgetFormInputText(),
      'fecha_alta'      => new sfWidgetFormDateTime(),
      'vitalicio'       => new sfWidgetFormInputCheckbox(),
      'activo'          => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'persona_nro_doc' => new sfValidatorInteger(),
      //'persona_nro_doc' => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'nro_doc', 'required' => false)),
      'fecha_alta'      => new sfValidatorDateTime(),
      'vitalicio'       => new sfValidatorBoolean(),
      'activo'          => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('socio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Socio';
  }


}
