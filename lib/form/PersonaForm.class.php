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
      $this->widgetSchema['e_mail']->setDefault("persona@dominio.com");
  }
}
