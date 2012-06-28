<?php

/**
 * direccion_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage direccion_abm
 * @author     Your name here
 */
class direccion_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Direccions = DireccionQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DireccionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DireccionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Direccion = DireccionQuery::create()->findPk($request->getParameter('persona_nro_doc'),
                         $request->getParameter('calle'),
                         $request->getParameter('numero'));
    $this->forward404Unless($Direccion, sprintf('Object Direccion does not exist (%s).', $request->getParameter('persona_nro_doc'),
                         $request->getParameter('calle'),
                         $request->getParameter('numero')));
    $this->form = new DireccionForm($Direccion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Direccion = DireccionQuery::create()->findPk($request->getParameter('persona_nro_doc'),
                         $request->getParameter('calle'),
                         $request->getParameter('numero'));
    $this->forward404Unless($Direccion, sprintf('Object Direccion does not exist (%s).', $request->getParameter('persona_nro_doc'),
                         $request->getParameter('calle'),
                         $request->getParameter('numero')));
    $this->form = new DireccionForm($Direccion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Direccion = DireccionQuery::create()->findPk($request->getParameter('persona_nro_doc'),
                         $request->getParameter('calle'),
                         $request->getParameter('numero'));
    $this->forward404Unless($Direccion, sprintf('Object Direccion does not exist (%s).', $request->getParameter('persona_nro_doc'),
                         $request->getParameter('calle'),
                         $request->getParameter('numero')));
    $Direccion->delete();

    $this->redirect('direccion_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Direccion = $form->save();

      $this->redirect('direccion_abm/edit?persona_nro_doc='.$Direccion->getPersonaNroDoc().'&calle='.$Direccion->getCalle().'&numero='.$Direccion->getNumero());
    }
  }
}
