<?php

/**
 * pedido_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage pedido_abm
 * @author     Your name here
 */
class pedido_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Pedidos = PedidoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PedidoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PedidoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Pedido = PedidoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pedido, sprintf('Object Pedido does not exist (%s).', $request->getParameter('id')));
    $this->form = new PedidoForm($Pedido);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Pedido = PedidoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pedido, sprintf('Object Pedido does not exist (%s).', $request->getParameter('id')));
    $this->form = new PedidoForm($Pedido);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Pedido = PedidoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pedido, sprintf('Object Pedido does not exist (%s).', $request->getParameter('id')));
    $Pedido->delete();

    $this->redirect('pedido_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Pedido = $form->save();

      $this->redirect('pedido_abm/index');
    }
  }
}
