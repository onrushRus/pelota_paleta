<?php

/**
 * Producto form base class.
 *
 * @method Producto getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProductoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'descripcion_prod'     => new sfWidgetFormInputText(),
      'marca'                => new sfWidgetFormInputText(),
      'presentacion'         => new sfWidgetFormInputText(),
      'precio'               => new sfWidgetFormInputText(),
      'pedido_producto_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Pedido')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descripcion_prod'     => new sfValidatorString(array('max_length' => 45)),
      'marca'                => new sfValidatorString(array('max_length' => 45)),
      'presentacion'         => new sfValidatorString(array('max_length' => 45)),
      'precio'               => new sfValidatorNumber(),
      'pedido_producto_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Pedido', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['pedido_producto_list']))
    {
      $values = array();
      foreach ($this->object->getPedidoProductos() as $obj)
      {
        $values[] = $obj->getPedidoId();
      }

      $this->setDefault('pedido_producto_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savePedidoProductoList($con);
  }

  public function savePedidoProductoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['pedido_producto_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(PedidoProductoPeer::PRODUCTO_ID, $this->object->getPrimaryKey());
    PedidoProductoPeer::doDelete($c, $con);

    $values = $this->getValue('pedido_producto_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PedidoProducto();
        $obj->setProductoId($this->object->getPrimaryKey());
        $obj->setPedidoId($value);
        $obj->save();
      }
    }
  }

}
