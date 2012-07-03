<?php

/**
 * TipoReserva form base class.
 *
 * @method TipoReserva getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipoReservaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'descirpcion_reserva' => new sfWidgetFormInputText(),
      'tiempo_reserva'      => new sfWidgetFormInputText(),
      'coste'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descirpcion_reserva' => new sfValidatorString(array('max_length' => 45)),
      'tiempo_reserva'      => new sfValidatorNumber(),
      'coste'               => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('tipo_reserva[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoReserva';
  }


}
