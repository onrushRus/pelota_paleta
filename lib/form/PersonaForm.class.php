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
      $this->widgetSchema['nro_doc']= new sfWidgetFormInputText();
      $this->validatorSchema['nro_doc'] = new sfValidatorInteger();
      
	  $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormInputText();
	  //$this->validatorSchema['fecha_nacimiento'] = new sfValidatorDate();
	  $this->widgetSchema['fecha_nacimiento']->setDefault("06-06-2006");
          //cambios de campos nombre y apellido por el comupuesto
	
	  $this->validatorSchema['e_mail'] = new sfValidatorEmail(); 
	  $this->validatorSchema['e_mail']->setOption('required', false);
          

        
	}
        
     /*   public function doUpdateObject($values){
            
            $this->getObject()->setNomApellido($values['nombre'].' '.$values['apellido']);
        }*/
}
