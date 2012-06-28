<?php

/**
 * inscripto_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage inscripto_abm
 * @author     Your name here
 */
class inscripto_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Inscriptos = InscriptoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InscriptoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InscriptoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Inscripto = InscriptoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Inscripto, sprintf('Object Inscripto does not exist (%s).', $request->getParameter('id')));
    $this->form = new InscriptoForm($Inscripto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Inscripto = InscriptoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Inscripto, sprintf('Object Inscripto does not exist (%s).', $request->getParameter('id')));
    $this->form = new InscriptoForm($Inscripto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Inscripto = InscriptoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Inscripto, sprintf('Object Inscripto does not exist (%s).', $request->getParameter('id')));
    $Inscripto->delete();

    $this->redirect('inscripto_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Inscripto = $form->save();

      $this->redirect('inscripto_abm/edit?id='.$Inscripto->getId());
    }
  }
}
