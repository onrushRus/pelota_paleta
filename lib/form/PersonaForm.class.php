<?php

/**
 * Persona form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class PersonaForm extends BasePersonaForm
{
  public function configure()
  {
      //$this->widgetSchema['e_mail']->setDefault("persona@dominio.com");
      $this->validatorSchema['e_mail']->setOption('required', false);
      $this->widgetSchema['fecha_nacimiento']->setDefault("06-06-2006");
      $this->widgetSchema['nro_doc']= new sfWidgetFormInputText();
	  $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormInputText();
	  $this->validatorSchema['nro_doc'] = new sfValidatorInteger(); 
	  $this->validatorSchema['e_mail'] = new sfValidatorEmail(); 
	
	}
}
