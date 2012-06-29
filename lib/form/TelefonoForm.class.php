<?php

/**
 * Telefono form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class TelefonoForm extends BaseTelefonoForm
{
  public function configure()
  {
      unset($this['persona_nro_doc']);
    //  $this->widgetSchema['persona_nro_doc']= new sfWidgetFormInputText();
    //  $this->validatorSchema['persona_nro_doc'] = new sfValidatorInteger();
      
      $this->widgetSchema['telefono_nro']= new sfWidgetFormInputText();
      $this->validatorSchema['telefono_nro'] = new sfValidatorString();
      $this->widgetSchema->setLabels(array(
          'telefono_nro' => 'Telefono',
      ));
  }
}
