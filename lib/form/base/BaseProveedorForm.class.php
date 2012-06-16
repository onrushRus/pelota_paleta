<?php

/**
 * Proveedor form base class.
 *
 * @method Proveedor getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProveedorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre_proveedor' => new sfWidgetFormInputText(),
      'dom_calle'        => new sfWidgetFormInputText(),
      'dom_nro'          => new sfWidgetFormInputText(),
      'dom_piso'         => new sfWidgetFormInputText(),
      'dom_dpto'         => new sfWidgetFormInputText(),
      'telefono'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre_proveedor' => new sfValidatorString(array('max_length' => 45)),
      'dom_calle'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'dom_nro'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'dom_piso'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'dom_dpto'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'telefono'         => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('proveedor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proveedor';
  }


}
