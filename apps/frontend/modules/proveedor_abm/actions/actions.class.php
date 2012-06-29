<?php

/**
 * proveedor_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage proveedor_abm
 * @author     Your name here
 */
class proveedor_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Proveedors = ProveedorQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProveedorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProveedorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Proveedor = ProveedorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Proveedor, sprintf('Object Proveedor does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorForm($Proveedor);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Proveedor = ProveedorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Proveedor, sprintf('Object Proveedor does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorForm($Proveedor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Proveedor = ProveedorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Proveedor, sprintf('Object Proveedor does not exist (%s).', $request->getParameter('id')));
       try {
            $Proveedor->delete();
            $this->redirect('proveedor_abm/index');
        } catch (Exception $e) {
            return sfView::ERROR;
        }
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Proveedor = $form->save();

      $this->redirect('proveedor_abm/edit?id='.$Proveedor->getId());
    }
  }
}
