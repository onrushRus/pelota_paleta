<?php

/**
 * Direccion form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class DireccionForm extends BaseDireccionForm
{
  public function configure()
  {
      $this->widgetSchema['calle']= new sfWidgetFormInputText();
      $this->widgetSchema['numero']= new sfWidgetFormInputText();
      
      $this->validatorSchema['calle']= new sfValidatorString();
      $this->validatorSchema['numero']= new sfValidatorInteger(); 
      
      $this->widgetSchema->setLabels(array(
      'monoblock_edif'  => 'Nro de Edificio',
      'dpto'            => 'Departamento',
    ));
  }
}
