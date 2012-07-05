<?php

/**
 * Reserva form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class ReservaForm extends BaseReservaForm
{
  public function configure($options = array(), $attributes = array())
  {
	 // $this->widgetSchema['socio_nro_doc']->addOption('type', 'text');
	  //$this->widgetSchema['socio_nro_doc']->setOption('is_hidden', false);
	  $this->widgetSchema['socio_nro_doc']= new sfWidgetFormInputText();
	  $this->widgetSchema['tipo_reserva_id']= new sfWidgetFormPropelChoice(array('model' => 'Tiporeserva', 'add_empty' => false));
	  $this->widgetSchema['dia_comienzo_reserva']= new sfWidgetFormInputText();
	  $this->widgetSchema['dia_fin_reserva']= new sfWidgetFormInputText();
	  $this->widgetSchema['hora_comienzo_reserva']= new sfWidgetFormInputText();
	  $this->widgetSchema['hora_fin_reserva']= new sfWidgetFormInputText();
          
	  $this->validatorSchema['dia_comienzo_reserva']= new sfValidatorDate(array('required' => true));
	  $this->validatorSchema['hora_comienzo_reserva']= new sfValidatorTime(array('required' => true));
          $this->validatorSchema['dia_fin_reserva']= new sfValidatorDate(array('required' => true));
	  $this->validatorSchema['hora_fin_reserva']= new sfValidatorTime(array('required' => true));
          
          $this->validatorSchema['dia_comienzo_reserva']->setMessage('required', "Falta: Dia comienzo reserva");
	  $this->validatorSchema['hora_comienzo_reserva']->setMessage('required', "Falta: Hora comienzo reserva");
          $this->validatorSchema['dia_fin_reserva']->setMessage('required', "Falta: Dia fin reserva");
	  $this->validatorSchema['hora_fin_reserva']->setMessage('required', "Falta: Hora fin reserva");
          
          
          $this->validatorSchema['socio_nro_doc']->setMessage("invalid", "El Nro documento no corresponde a un socio");
        //  $this->validatorSchema['socio_nro_doc']->setOption("min_length", 6);
          
          
          $this->widgetSchema->setLabels(array(
              'socio_nro_doc' => 'Nro Documento', 
              'pelotari_nro_doc' => 'Nro documentado participante', 
              'estado' => 'Reserva activa?',
          ));
          
  }
}
