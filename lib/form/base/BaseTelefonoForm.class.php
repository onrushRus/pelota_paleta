<?php

/**
 * Telefono form base class.
 *
 * @method Telefono getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTelefonoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_nro_doc' => new sfWidgetFormInputHidden(),
      'telefono_nro'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'persona_nro_doc' => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'nro_doc', 'required' => false)),
      'telefono_nro'    => new sfValidatorChoice(array('choices' => array($this->getObject()->getTelefonoNro()), 'empty_value' => $this->getObject()->getTelefonoNro(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('telefono[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Telefono';
  }


}
