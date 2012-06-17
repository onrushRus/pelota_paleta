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
  }
}
