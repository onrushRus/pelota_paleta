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
	  $this->widgetSchema['hora_comienzo_reserva']= new sfWidgetFormTime();
	  
	  $this->validatorSchema['dia_comienzo_reserva']= new sfValidatorDate(array('required' => false));
	  $this->validatorSchema['hora_comienzo_reserva']= new sfValidatorTime(array('required' => false));
          
          $this->validatorSchema['socio_nro_doc']->setMessage("invalid", "Falta el dni socio");
        //  $this->validatorSchema['socio_nro_doc']->setOption("min_length", 6);
          
  }
}
