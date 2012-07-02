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
      
      $this->validatorSchema['nombre_proveedor']->setMessage('required', 'Proveedor es Requerido');
      
      $this->validatorSchema['dom_calle']->setMessage('invalid', 'Nro de documento debe ser un entero');
      
      $this->validatorSchema['dom_nro'] = new sfValidatorInteger();
      $this->validatorSchema['dom_nro']->setMessage('invalid', 'Nro de domicilio debe ser un entero');
      $this->validatorSchema['dom_nro']->setOption('required', false);
      $this->validatorSchema['dom_nro']->setOption('min', 0);
      $this->validatorSchema['dom_nro']->setMessage('min', 'Nro de domicilio muy corto');
      $this->validatorSchema['dom_nro']->setOption('max', 100000);
      $this->validatorSchema['dom_nro']->setMessage('max', 'Nro de domicilio muy largo');
      
      $this->validatorSchema['dom_piso'] = new sfValidatorInteger();
      $this->validatorSchema['dom_piso']->setMessage('invalid', 'Nro de piso debe ser un entero');
      $this->validatorSchema['dom_piso']->setOption('required', false);
      $this->validatorSchema['dom_piso']->setOption('min', 0);
      $this->validatorSchema['dom_piso']->setMessage('min', 'Nro de piso muy corto');
      $this->validatorSchema['dom_piso']->setOption('max', 100000);
      $this->validatorSchema['dom_piso']->setMessage('max', 'Nro de piso muy largo');
      
      $this->validatorSchema['dom_dpto']->setOption('min_length', '1');
      $this->validatorSchema['dom_dpto']->setMessage('min_length', 'Nro de piso muy corto');
      $this->validatorSchema['dom_dpto']->setOption('max_length', '4');
      $this->validatorSchema['dom_dpto']->setMessage('max_length', 'Nro de piso muy largo');
      
      $this->validatorSchema['telefono'] = new sfValidatorInteger();
      $this->validatorSchema['telefono']->setMessage('invalid', 'Telefono debe ser numérico');
      $this->validatorSchema['telefono']->setOption('min', '6');
      $this->validatorSchema['telefono']->setMessage('min', 'Telefono muy corto');
      $this->validatorSchema['telefono']->setOption('max', '10');
      $this->validatorSchema['telefono']->setMessage('max', 'Telefono muy largo');
      
  }
}
