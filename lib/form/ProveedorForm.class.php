<?php

/**
 * Proveedor form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class ProveedorForm extends BaseProveedorForm
{
  public function configure()
  {
      $this->widgetSchema->setLabels(array(
      'nombre_proveedor' => 'Proveedor',
      'dom_calle'        => 'Calle',
      'dom_nro'          => 'Número',
      'dom_piso'         => 'Piso',
      'dom_dpto'         => 'Departamento',
    ));
      
      $this->validatorSchema['nombre_proveedor']->setMessage('required', 'Nro de documento es Requerido');
      $this->validatorSchema['nombre_proveedor']->setMessage('invalid', 'Nro de documento debe ser un entero');
      
      $this->validatorSchema['dom_calle']->setMessage('required', 'Nro de documento es Requerido');
      $this->validatorSchema['dom_calle']->setMessage('invalid', 'Nro de documento debe ser un entero');
      
      $this->validatorSchema['dom_nro']->setMessage('required', 'Nro de documento es Requerido');
      $this->validatorSchema['dom_nro']->setMessage('invalid', 'Nro de documento debe ser un entero');
      
      $this->validatorSchema['dom_piso']->setMessage('required', 'Nro de documento es Requerido');
      $this->validatorSchema['dom_piso']->setMessage('invalid', 'Nro de documento debe ser un entero');
      
      $this->validatorSchema['dom_dpto']->setMessage('required', 'Nro de documento es Requerido');
      $this->validatorSchema['dom_dpto']->setMessage('invalid', 'Nro de documento debe ser un entero');
      
      
      
      
  }
}
