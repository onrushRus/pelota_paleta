<?php

/**
 * resultado_torneo_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage resultado_torneo_abm
 * @author     Your name here
 */
class resultado_torneo_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ResultadoTorneos = ResultadoTorneoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ResultadoTorneoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ResultadoTorneoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $ResultadoTorneo = ResultadoTorneoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ResultadoTorneo, sprintf('Object ResultadoTorneo does not exist (%s).', $request->getParameter('id')));
    $this->form = new ResultadoTorneoForm($ResultadoTorneo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $ResultadoTorneo = ResultadoTorneoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ResultadoTorneo, sprintf('Object ResultadoTorneo does not exist (%s).', $request->getParameter('id')));
    $this->form = new ResultadoTorneoForm($ResultadoTorneo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $ResultadoTorneo = ResultadoTorneoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ResultadoTorneo, sprintf('Object ResultadoTorneo does not exist (%s).', $request->getParameter('id')));
    $ResultadoTorneo->delete();

    $this->redirect('resultado_torneo_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ResultadoTorneo = $form->save();

      $this->redirect('resultado_torneo_abm/edit?id='.$ResultadoTorneo->getId());
    }
  }
}
