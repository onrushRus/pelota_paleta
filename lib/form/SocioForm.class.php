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
  {	  $this->widgetSchema['fecha_alta'] = new sfWidgetFormInputText();
      //$this->validatorSchema['fecha_alta']->setOption('required', false);
      $this->widgetSchema['persona_nro_doc']= new sfWidgetFormInputText();
      $this->validatorSchema['persona_nro_doc'] = new sfValidatorInteger();
      
  }
}
