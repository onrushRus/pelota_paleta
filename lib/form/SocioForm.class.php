<?php

/**
 * Socio form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class SocioForm extends BaseSocioForm
{
  public function configure()
  {   
      
      $this->widgetSchema['persona_nro_doc']= new sfWidgetFormInputText();
      $this->validatorSchema['persona_nro_doc'] = new sfValidatorInteger();
      $this->widgetSchema->setLabels(array(
          'persona_nro_doc'  =>  'Nro Documento',
          'fecha_alta'       =>  'Fecha de alta'
      ));
      
      $this->validatorSchema['persona_nro_doc']->setMessage('required', 'Nro de documento es Requerido');
      $this->validatorSchema['persona_nro_doc']->setMessage('invalid', 'Nro de documento debe ser un entero');
      $this->validatorSchema['persona_nro_doc']->setOption('min', 1000000);
      $this->validatorSchema['persona_nro_doc']->setMessage('min', 'Nro de documento muy corto');
      $this->validatorSchema['persona_nro_doc']->setOption('max', 99999999);
      $this->validatorSchema['persona_nro_doc']->setMessage('max', 'Nro de documento muy largo');
      
      
      $this->widgetSchema['fecha_alta'] = new sfWidgetFormInputText();
      $this->validatorSchema['fecha_alta']->setMessage('required', 'Fecha de Alta es Requerida');
      $this->validatorSchema['fecha_alta']->setMessage('invalid', 'Fecha de Alta inválida');
      //$this->validatorSchema['fecha_alta']->setOption('required', false);
  }
}
