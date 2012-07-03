<?php

/**
 * Reserva form base class.
 *
 * @method Reserva getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseReservaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'socio_nro_doc'         => new sfWidgetFormInputHidden(),
      'tipo_reserva_id'       => new sfWidgetFormInputHidden(),
      'dia_comienzo_reserva'  => new sfWidgetFormInputHidden(),
      'hora_comienzo_reserva' => new sfWidgetFormInputHidden(),
      'dia_fin_reserva'       => new sfWidgetFormDate(),
      'hora_fin_reserva'      => new sfWidgetFormTime(),
      'cantidad_turnos'       => new sfWidgetFormInputText(),
      'estado'                => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'socio_nro_doc'         => new sfValidatorPropelChoice(array('model' => 'Socio', 'column' => 'persona_nro_doc', 'required' => false)),
      'tipo_reserva_id'       => new sfValidatorPropelChoice(array('model' => 'TipoReserva', 'column' => 'id', 'required' => false)),
      'dia_comienzo_reserva'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getDiaComienzoReserva()), 'empty_value' => $this->getObject()->getDiaComienzoReserva(), 'required' => false)),
      'hora_comienzo_reserva' => new sfValidatorChoice(array('choices' => array($this->getObject()->getHoraComienzoReserva()), 'empty_value' => $this->getObject()->getHoraComienzoReserva(), 'required' => false)),
      'dia_fin_reserva'       => new sfValidatorDate(array('required' => false)),
      'hora_fin_reserva'      => new sfValidatorTime(array('required' => false)),
      'cantidad_turnos'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'estado'                => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('reserva[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reserva';
  }


}
