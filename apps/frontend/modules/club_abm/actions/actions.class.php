<?php

/**
 * club_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage club_abm
 * @author     Your name here
 */
class club_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Clubs = ClubQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClubForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClubForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Club = ClubQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Club, sprintf('Object Club does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClubForm($Club);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Club = ClubQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Club, sprintf('Object Club does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClubForm($Club);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Club = ClubQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Club, sprintf('Object Club does not exist (%s).', $request->getParameter('id')));
    $Club->delete();

    $this->redirect('club_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Club = $form->save();

      $this->redirect('club_abm/edit?id='.$Club->getId());
    }
  }
}
