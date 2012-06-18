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
	  $this->widgetSchema['tipo_reserva_id']= new sfWidgetFormInputText();
	  $this->widgetSchema['dia_comienzo_reserva']= new sfWidgetFormInputText();
	  $this->widgetSchema['dia_fin_reserva']= new sfWidgetFormInputText();
	  $this->widgetSchema['hora_comienzo_reserva']= new sfWidgetFormTime();
  }
}
