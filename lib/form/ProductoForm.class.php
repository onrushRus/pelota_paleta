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
	//$this->widgetSchema['id']= new sfWidgetFormInputText();

        parent::configure();

        if($this->isNew())
            $child = new Stock();
        else
            $child = $this->getObject()->getStock();
        $child->Parent = $this->getObject();
        $this->getObject()->setStock($child);
        
        $form2 = new StockForm($child);

        $this->embedForm('stock', $form2);

        unset($this['pedido_producto_list']);
        
        $this->widgetSchema['descripcion_prod']= new sfWidgetFormInputText();
        $this->validatorSchema['descripcion_prod'] = new sfValidatorString();
        $this->validatorSchema['descripcion_prod']->setMessage('required', 'La descripción es Requerida');
        //$this->validatorSchema['descripcion_prod']->setMessage('invalid', 'Nro de documento debe ser un entero');
        $this->validatorSchema['descripcion_prod']->setOption('min_length', 3);
        $this->validatorSchema['descripcion_prod']->setMessage('min_length', 'La descripción es muy corta');
        $this->validatorSchema['descripcion_prod']->setOption('max_length', 25);
        $this->validatorSchema['descripcion_prod']->setMessage('max_length', 'La descripción es muy larga');
        
        $this->widgetSchema['marca']= new sfWidgetFormInputText();
        $this->validatorSchema['marca'] = new sfValidatorString();
        $this->validatorSchema['marca']->setMessage('required', 'La marca es Requerida');
        //$this->validatorSchema['marca']->setMessage('invalid', 'Nro de documento debe ser un entero');
        $this->validatorSchema['marca']->setOption('min_length', 3);
        $this->validatorSchema['marca']->setMessage('min_length', 'La marca debe tener mas caracteres');
        $this->validatorSchema['marca']->setOption('max_length', 25);
        $this->validatorSchema['marca']->setMessage('max_length', 'La marca debe tener menos caracteres');
        
        $this->widgetSchema['presentacion']= new sfWidgetFormInputText();
        $this->validatorSchema['presentacion'] = new sfValidatorString();
        $this->validatorSchema['presentacion']->setMessage('required', 'La presentacion es Requerida');
        //$this->validatorSchema['presentacion']->setMessage('invalid', 'Nro de documento debe ser un entero');
        $this->validatorSchema['presentacion']->setOption('min_length', 3);
        $this->validatorSchema['presentacion']->setMessage('min_length', 'La presentacion debe tener mas caracteres');
        $this->validatorSchema['presentacion']->setOption('max_length', 25);
        $this->validatorSchema['presentacion']->setMessage('max_length', 'La presentacion debe tener menos caracteres');
        
        $this->widgetSchema['precio']= new sfWidgetFormInputText();
        $this->validatorSchema['precio'] = new sfValidatorNumber();
        $this->validatorSchema['precio']->setMessage('required', 'La precio es Requerido');
        //$this->validatorSchema['precio']->setMessage('invalid', 'Nro de documento debe ser un entero');
        $this->validatorSchema['precio']->setOption('min', 0);
        $this->validatorSchema['precio']->setMessage('min', 'La precio debe representar ganancia');
        $this->validatorSchema['precio']->setOption('max', 100);
        $this->validatorSchema['precio']->setMessage('max', 'La precio debe no espantar');
        
        //$this->embedRelation('PedidoProducto');
        //esto anda,,, pasa q no guarda en la tabla stock pq no existe
        // la referencia de un producto q aun no esta creado
        
        $this->widgetSchema->setLabels(array(
            'descripcion_prod' => 'Descripción',
            'presentacion' => 'Presentación',
        ));
    }
}
