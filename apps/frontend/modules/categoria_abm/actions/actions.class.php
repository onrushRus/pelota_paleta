<?php

/**
 * categoria_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage categoria_abm
 * @author     Your name here
 */
class categoria_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Categorias = CategoriaQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategoriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CategoriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Categoria = CategoriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Categoria, sprintf('Object Categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaForm($Categoria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Categoria = CategoriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Categoria, sprintf('Object Categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaForm($Categoria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Categoria = CategoriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Categoria, sprintf('Object Categoria does not exist (%s).', $request->getParameter('id')));
    $Categoria->delete();

    $this->redirect('categoria_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Categoria = $form->save();

      $this->redirect('categoria_abm/edit?id='.$Categoria->getId());
    }
  }
}
