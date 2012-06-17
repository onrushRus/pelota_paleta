<?php

/**
 * Producto form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class ProductoForm extends BaseProductoForm
{
  public function configure()
  {
	        $this->widgetSchema['descripcion_prod']->setDefault("caca");
  }
}
