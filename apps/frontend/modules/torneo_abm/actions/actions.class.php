<?php

/**
 * torneo_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage torneo_abm
 * @author     Your name here
 */
class torneo_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Torneos = TorneoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TorneoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TorneoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Torneo = TorneoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Torneo, sprintf('Object Torneo does not exist (%s).', $request->getParameter('id')));
    $this->form = new TorneoForm($Torneo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Torneo = TorneoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Torneo, sprintf('Object Torneo does not exist (%s).', $request->getParameter('id')));
    $this->form = new TorneoForm($Torneo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Torneo = TorneoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Torneo, sprintf('Object Torneo does not exist (%s).', $request->getParameter('id')));
    $Torneo->delete();

    $this->redirect('torneo_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Torneo = $form->save();

      $this->redirect('torneo_abm/index');
    }
  }
}
