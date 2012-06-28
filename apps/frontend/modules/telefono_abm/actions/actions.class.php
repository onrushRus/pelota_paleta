<?php

/**
 * telefono_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage telefono_abm
 * @author     Your name here
 */
class telefono_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Telefonos = TelefonoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TelefonoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TelefonoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Telefono = TelefonoQuery::create()->findPk($request->getParameter('persona_nro_doc'),
                           $request->getParameter('telefono_nro'));
    $this->forward404Unless($Telefono, sprintf('Object Telefono does not exist (%s).', $request->getParameter('persona_nro_doc'),
                           $request->getParameter('telefono_nro')));
    $this->form = new TelefonoForm($Telefono);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Telefono = TelefonoQuery::create()->findPk($request->getParameter('persona_nro_doc'),
                           $request->getParameter('telefono_nro'));
    $this->forward404Unless($Telefono, sprintf('Object Telefono does not exist (%s).', $request->getParameter('persona_nro_doc'),
                           $request->getParameter('telefono_nro')));
    $this->form = new TelefonoForm($Telefono);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Telefono = TelefonoQuery::create()->findPk($request->getParameter('persona_nro_doc'),
                           $request->getParameter('telefono_nro'));
    $this->forward404Unless($Telefono, sprintf('Object Telefono does not exist (%s).', $request->getParameter('persona_nro_doc'),
                           $request->getParameter('telefono_nro')));
    $Telefono->delete();

    $this->redirect('telefono_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Telefono = $form->save();

      $this->redirect('telefono_abm/edit?persona_nro_doc='.$Telefono->getPersonaNroDoc().'&telefono_nro='.$Telefono->getTelefonoNro());
    }
  }
}
