<?php

/**
 * PuntosPuesto form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class PuntosPuestoForm extends BasePuntosPuestoForm
{
  public function configure()
  {
      $this->widgetSchema['puesto']= new sfWidgetFormInputText();
      $this->validatorSchema['puesto'] = new sfValidatorInteger();
      $this->validatorSchema['puesto']->setMessage('required', 'Puesto Requerido');
      $this->validatorSchema['puesto']->setMessage('invalid', 'Puesto debe ser un entero');
      $this->validatorSchema['puesto']->setOption('min', 1);
      $this->validatorSchema['puesto']->setMessage('min', 'Los puestos van del 1 al 10');
      $this->validatorSchema['puesto']->setOption('max', 10);
      $this->validatorSchema['puesto']->setMessage('max', 'Los puestos van del 1 al 10');
      
      $this->widgetSchema['puntos_por_puesto']= new sfWidgetFormInputText();
      $this->validatorSchema['puntos_por_puesto'] = new sfValidatorInteger();
      $this->validatorSchema['puntos_por_puesto']->setMessage('required', 'Puntos Requeridos');
      $this->validatorSchema['puntos_por_puesto']->setMessage('invalid', 'Puntos deben ser un entero');
      $this->validatorSchema['puntos_por_puesto']->setOption('min', 10);
      $this->validatorSchema['puntos_por_puesto']->setMessage('min', 'Puntos varian del 10 al 100');
      $this->validatorSchema['puntos_por_puesto']->setOption('max', 100);
      $this->validatorSchema['puntos_por_puesto']->setMessage('max', 'Puntos varian del 10 al 100');
      
  }
}
