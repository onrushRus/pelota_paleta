<?php

/**
 * encabezado_pedido_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage encabezado_pedido_abm
 * @author     Your name here
 */
class encabezado_pedido_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->EncabezadoPedidos = EncabezadoPedidoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EncabezadoPedidoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EncabezadoPedidoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $EncabezadoPedido = EncabezadoPedidoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($EncabezadoPedido, sprintf('Object EncabezadoPedido does not exist (%s).', $request->getParameter('id')));
    $this->form = new EncabezadoPedidoForm($EncabezadoPedido);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $EncabezadoPedido = EncabezadoPedidoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($EncabezadoPedido, sprintf('Object EncabezadoPedido does not exist (%s).', $request->getParameter('id')));
    $this->form = new EncabezadoPedidoForm($EncabezadoPedido);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $EncabezadoPedido = EncabezadoPedidoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($EncabezadoPedido, sprintf('Object EncabezadoPedido does not exist (%s).', $request->getParameter('id')));
    $EncabezadoPedido->delete();

    $this->redirect('encabezado_pedido_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $EncabezadoPedido = $form->save();

      $this->redirect('encabezado_pedido_abm/edit?id='.$EncabezadoPedido->getId());
    }
  }
}
