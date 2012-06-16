<?php

/**
 * Direccion form base class.
 *
 * @method Direccion getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDireccionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_nro_doc' => new sfWidgetFormInputHidden(),
      'calle'           => new sfWidgetFormInputHidden(),
      'numero'          => new sfWidgetFormInputHidden(),
      'monoblock_edif'  => new sfWidgetFormInputText(),
      'piso'            => new sfWidgetFormInputText(),
      'dpto'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'persona_nro_doc' => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'nro_doc', 'required' => false)),
      'calle'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getCalle()), 'empty_value' => $this->getObject()->getCalle(), 'required' => false)),
      'numero'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getNumero()), 'empty_value' => $this->getObject()->getNumero(), 'required' => false)),
      'monoblock_edif'  => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'piso'            => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'dpto'            => new sfValidatorString(array('max_length' => 3, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('direccion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Direccion';
  }


}
