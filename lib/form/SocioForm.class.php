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
      $this->validatorSchema['fecha_alta']->setOption('required', false);
  }
}
