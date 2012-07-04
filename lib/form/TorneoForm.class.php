<?php

/**
 * Torneo form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class TorneoForm extends BaseTorneoForm
{
  public function configure()
  {
     // $arreglo= array('1'=>'nacional');
      //$this->widgetSchema['tipo_torneo']= new sfWidgetFormText();
      //$this->validatorSchema['tipo_torneo'] = new sfValidatorInteger();
      
      $this->widgetSchema['anio']= new sfWidgetFormInputText();
      $this->validatorSchema['anio'] = new sfValidatorInteger();
      $this->validatorSchema['anio']->setMessage('required', 'Año Requerido');
      $this->validatorSchema['anio']->setMessage('invalid', 'Año debe ser un entero');
      $this->validatorSchema['anio']->setOption('min', 2012);
      $this->validatorSchema['anio']->setMessage('min', 'Año debe ser mayor 2011');
      $this->validatorSchema['anio']->setOption('max', 2099);
      $this->validatorSchema['anio']->setMessage('max', 'Año no puede superar el 2099');
      
      $this->validatorSchema['nombre']->setMessage('required', 'Nombre es Requerido');
      $this->validatorSchema['nombre']->setMessage('invalid', 'Nombre debe tener letras');
      $this->validatorSchema['nombre']->setOption('min_length', '3');
      $this->validatorSchema['nombre']->setMessage('min_length', 'Nombre muy corto');
      $this->validatorSchema['nombre']->setOption('max_length', '45');
      $this->validatorSchema['nombre']->setMessage('max_length', 'Nombre muy largo');
      
      $this->embedRelation('TorneoCategoria');
       $this->widgetSchema->setLabels(array(
           'anio' => 'Año','tipo_torneo' => 'Nacional?',
       ));
  }
}
