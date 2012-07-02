<?php

/**
 * Club form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class ClubForm extends BaseClubForm
{
  public function configure()
  {
      $this->validatorSchema['nombre_club']->setMessage('required', 'El nombre es Requerido');

  }
}
