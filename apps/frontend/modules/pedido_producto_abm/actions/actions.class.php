<?php

/**
 * pedido_producto_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage pedido_producto_abm
 * @author     Your name here
 */
class pedido_producto_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->PedidoProductos = PedidoProductoQuery::create()->orderByPedidoId()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PedidoProductoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PedidoProductoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $PedidoProducto = PedidoProductoQuery::create()->findPk(array($request->getParameter('pedido_id'),
               $request->getParameter('producto_id')));
    $this->forward404Unless($PedidoProducto, sprintf('Object PedidoProducto does not exist (%s).', $request->getParameter('pedido_id'),
               $request->getParameter('producto_id')));
    $this->form = new PedidoProductoForm($PedidoProducto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $PedidoProducto = PedidoProductoQuery::create()->findPk(array($request->getParameter('pedido_id'),
               $request->getParameter('producto_id')));
    $this->forward404Unless($PedidoProducto, sprintf('Object PedidoProducto does not exist (%s).', $request->getParameter('pedido_id'),
               $request->getParameter('producto_id')));
    $this->form = new PedidoProductoForm($PedidoProducto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $PedidoProducto = PedidoProductoQuery::create()->findPk(array($request->getParameter('pedido_id'),
               $request->getParameter('producto_id')));
    $this->forward404Unless($PedidoProducto, sprintf('Object PedidoProducto does not exist (%s).', $request->getParameter('pedido_id'),
               $request->getParameter('producto_id')));
    $PedidoProducto->delete();

    $this->redirect('pedido_producto_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $PedidoProducto = $form->save();

      $this->redirect('pedido_producto_abm/edit?pedido_id='.$PedidoProducto->getPedidoId().'&producto_id='.$PedidoProducto->getProductoId());
    }
  }
}
