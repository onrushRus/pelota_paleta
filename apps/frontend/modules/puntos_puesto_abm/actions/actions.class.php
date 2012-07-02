<?php

/**
 * puntos_puesto_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage puntos_puesto_abm
 * @author     Your name here
 */
class puntos_puesto_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->PuntosPuestos = PuntosPuestoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PuntosPuestoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PuntosPuestoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $PuntosPuesto = PuntosPuestoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PuntosPuesto, sprintf('Object PuntosPuesto does not exist (%s).', $request->getParameter('id')));
    $this->form = new PuntosPuestoForm($PuntosPuesto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $PuntosPuesto = PuntosPuestoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PuntosPuesto, sprintf('Object PuntosPuesto does not exist (%s).', $request->getParameter('id')));
    $this->form = new PuntosPuestoForm($PuntosPuesto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $PuntosPuesto = PuntosPuestoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PuntosPuesto, sprintf('Object PuntosPuesto does not exist (%s).', $request->getParameter('id')));
    $PuntosPuesto->delete();

    $this->redirect('puntos_puesto_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $PuntosPuesto = $form->save();

      $this->redirect('puntos_puesto_abm/index');
    }
  }
}
