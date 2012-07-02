<?php

/**
 * socio_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage socio_abm
 * @author     Your name here
 */
class socio_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Socios = SocioQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SocioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SocioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Socio = SocioQuery::create()->findPk($request->getParameter('persona_nro_doc'));
    $this->forward404Unless($Socio, sprintf('Object Socio does not exist (%s).', $request->getParameter('persona_nro_doc')));
    $this->form = new SocioForm($Socio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Socio = SocioQuery::create()->findPk($request->getParameter('persona_nro_doc'));
    $this->forward404Unless($Socio, sprintf('Object Socio does not exist (%s).', $request->getParameter('persona_nro_doc')));
    $this->form = new SocioForm($Socio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Socio = SocioQuery::create()->findPk($request->getParameter('persona_nro_doc'));
    $this->forward404Unless($Socio, sprintf('Object Socio does not exist (%s).', $request->getParameter('persona_nro_doc')));
    $Socio->delete();

    $this->redirect('socio_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Socio = $form->save();

      $this->redirect('socio_abm/index');
    }
  }
}
