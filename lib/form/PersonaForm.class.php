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
      $this->validatorSchema['nro_doc']->setMessage('required', 'Nro de documento es Requerido');
      $this->validatorSchema['nro_doc']->setMessage('invalid', 'Nro de documento debe ser un entero');
      $this->validatorSchema['nro_doc']->setOption('min', 1000000);
      $this->validatorSchema['nro_doc']->setMessage('min', 'Nro de documento muy corto');
      $this->validatorSchema['nro_doc']->setOption('max', 99999999);
      $this->validatorSchema['nro_doc']->setMessage('max', 'Nro de documento muy largo');
      
      
      $this->validatorSchema['nom_apellido']->setMessage('required', 'Nobre y apellido son Requeridos');
      $this->validatorSchema['nom_apellido']->setMessage('invalid', 'Nobre y apellido debe tener letras');
      $this->validatorSchema['nom_apellido']->setOption('min_length', '7');
      $this->validatorSchema['nom_apellido']->setMessage('min_length', 'Nobre y apellido muy cortos');
      $this->validatorSchema['nom_apellido']->setOption('max_length', '45');
      $this->validatorSchema['nom_apellido']->setMessage('max_length', 'Nobre y apellido muy largos');
      
      $anios = range(date('Y') - 80, date('Y') - 18);
      $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormInputText();
      //$this->validatorSchema['fecha_nacimiento'] = new sfValidatorDate();
      $this->widgetSchema['fecha_nacimiento']->setDefault("06-06-2006");
      
      $this->validatorSchema['fecha_nacimiento']->setMessage('required', 'Fecha Nacimiento es Requerida');
      $this->validatorSchema['fecha_nacimiento']->setMessage('invalid', 'Fecha Nacimiento inválida');
      //$this->widgetSchema['fecha_nacimiento']->setOption('years', $anios);
      //$this->widgetSchema['fecha_nacimiento']->setOption('years', array_combine($anios, $anios));
      
      $this->validatorSchema['e_mail'] = new sfValidatorEmail(); 
      $this->validatorSchema['e_mail']->setOption('required', false);
      $this->validatorSchema['e_mail']->setMessage('invalid', 'E-mail inválido (ejemplo@correo.com)');
      
      //$this->validatorSchema['localidad_id']->setOption('required', true);
      //$this->validatorSchema['localidad_id']->setMessage('required', 'Seleccione Localidad');
      //cambios de campos nombre y apellido por el comupuesto
      
      
      //$this->widgetSchema['localidad_id']->setOption('query_methods', array('joinWithProvincia','joinWithLocalidad'));
      $this->widgetSchema['localidad_id']->setOption('method','getProvloc');
      
      
      
          $this->embedRelation('Telefono');
          $this->embedRelation('Direccion');
          
          $this->widgetSchema->setLabels(array(
         'nro_doc'          => 'Nro documento',
         'nom_apellido'     => 'Nombre y Apellido',
         'fecha_nacimiento' => 'Fecha de Nacimiento',
         'e_mail'           => 'E-mail',
         'localidad_id'     => 'Localidad',          
      ));
	}
        
        
     /*   public function doUpdateObject($values){
            
            $this->getObject()->setNomApellido($values['nombre'].' '.$values['apellido']);
        }*/
}
