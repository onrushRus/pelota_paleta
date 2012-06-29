<?php

/**
 * Pedido form base class.
 *
 * @method Pedido getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePedidoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'proveedor_id'         => new sfWidgetFormPropelChoice(array('model' => 'Proveedor', 'add_empty' => false)),
      'fecha_pedido'         => new sfWidgetFormDateTime(),
      'pedido_producto_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Producto')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'proveedor_id'         => new sfValidatorPropelChoice(array('model' => 'Proveedor', 'column' => 'id')),
      'fecha_pedido'         => new sfValidatorDateTime(),
      'pedido_producto_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Producto', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pedido[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pedido';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['pedido_producto_list']))
    {
      $values = array();
      foreach ($this->object->getPedidoProductos() as $obj)
      {
        $values[] = $obj->getProductoId();
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
    $c->add(PedidoProductoPeer::PEDIDO_ID, $this->object->getPrimaryKey());
    PedidoProductoPeer::doDelete($c, $con);

    $values = $this->getValue('pedido_producto_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PedidoProducto();
        $obj->setPedidoId($this->object->getPrimaryKey());
        $obj->setProductoId($value);
        $obj->save();
      }
    }
  }

}
