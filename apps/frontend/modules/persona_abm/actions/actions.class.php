<?php

/**
 * persona_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage persona_abm
 * @author     Your name here
 */
class persona_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Personas = PersonaQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PersonaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PersonaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Persona = PersonaQuery::create()->findPk($request->getParameter('nro_doc'));
    $this->forward404Unless($Persona, sprintf('Object Persona does not exist (%s).', $request->getParameter('nro_doc')));
    $this->form = new PersonaForm($Persona);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Persona = PersonaQuery::create()->findPk($request->getParameter('nro_doc'));
    $this->forward404Unless($Persona, sprintf('Object Persona does not exist (%s).', $request->getParameter('nro_doc')));
    $this->form = new PersonaForm($Persona);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Persona = PersonaQuery::create()->findPk($request->getParameter('nro_doc'));
    $this->forward404Unless($Persona, sprintf('Object Persona does not exist (%s).', $request->getParameter('nro_doc')));
    $Persona->delete();

    $this->redirect('persona_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Persona = $form->save();

      $this->redirect('persona_abm/index');
    }
  }
}
