<?php

/**
 * cuerpo_pedido_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage cuerpo_pedido_abm
 * @author     Your name here
 */
class cuerpo_pedido_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->CuerpoPedidos = CuerpoPedidoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CuerpoPedidoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CuerpoPedidoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $CuerpoPedido = CuerpoPedidoQuery::create()->findPk($request->getParameter('encabezado_pedido_id'),
                   $request->getParameter('producto_id'));
    $this->forward404Unless($CuerpoPedido, sprintf('Object CuerpoPedido does not exist (%s).', $request->getParameter('encabezado_pedido_id'),
                   $request->getParameter('producto_id')));
    $this->form = new CuerpoPedidoForm($CuerpoPedido);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $CuerpoPedido = CuerpoPedidoQuery::create()->findPk($request->getParameter('encabezado_pedido_id'),
                   $request->getParameter('producto_id'));
    $this->forward404Unless($CuerpoPedido, sprintf('Object CuerpoPedido does not exist (%s).', $request->getParameter('encabezado_pedido_id'),
                   $request->getParameter('producto_id')));
    $this->form = new CuerpoPedidoForm($CuerpoPedido);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $CuerpoPedido = CuerpoPedidoQuery::create()->findPk($request->getParameter('encabezado_pedido_id'),
                   $request->getParameter('producto_id'));
    $this->forward404Unless($CuerpoPedido, sprintf('Object CuerpoPedido does not exist (%s).', $request->getParameter('encabezado_pedido_id'),
                   $request->getParameter('producto_id')));
    $CuerpoPedido->delete();

    $this->redirect('cuerpo_pedido_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $CuerpoPedido = $form->save();

      $this->redirect('cuerpo_pedido_abm/edit?encabezado_pedido_id='.$CuerpoPedido->getEncabezadoPedidoId().'&producto_id='.$CuerpoPedido->getProductoId());
    }
  }
}
