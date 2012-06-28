<?php

/**
 * tipo_reserva_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage tipo_reserva_abm
 * @author     Your name here
 */
class tipo_reserva_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->TipoReservas = TipoReservaQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TipoReservaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TipoReservaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $TipoReserva = TipoReservaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoReserva, sprintf('Object TipoReserva does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipoReservaForm($TipoReserva);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $TipoReserva = TipoReservaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoReserva, sprintf('Object TipoReserva does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipoReservaForm($TipoReserva);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $TipoReserva = TipoReservaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($TipoReserva, sprintf('Object TipoReserva does not exist (%s).', $request->getParameter('id')));
    $TipoReserva->delete();

    $this->redirect('tipo_reserva_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $TipoReserva = $form->save();

      $this->redirect('tipo_reserva_abm/edit?id='.$TipoReserva->getId());
    }
  }
}
