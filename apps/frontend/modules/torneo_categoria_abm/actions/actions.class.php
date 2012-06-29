<?php

/**
 * torneo_categoria_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage torneo_categoria_abm
 * @author     Your name here
 */
class torneo_categoria_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->TorneoCategorias = TorneoCategoriaQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TorneoCategoriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TorneoCategoriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $TorneoCategoria = TorneoCategoriaQuery::create()->findPk($request->getParameter('id_torneo_categoria'));
    $this->forward404Unless($TorneoCategoria, sprintf('Object TorneoCategoria does not exist (%s).', $request->getParameter('id_torneo_categoria')));
    $this->form = new TorneoCategoriaForm($TorneoCategoria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $TorneoCategoria = TorneoCategoriaQuery::create()->findPk($request->getParameter('id_torneo_categoria'));
    $this->forward404Unless($TorneoCategoria, sprintf('Object TorneoCategoria does not exist (%s).', $request->getParameter('id_torneo_categoria')));
    $this->form = new TorneoCategoriaForm($TorneoCategoria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $TorneoCategoria = TorneoCategoriaQuery::create()->findPk($request->getParameter('id_torneo_categoria'));
    $this->forward404Unless($TorneoCategoria, sprintf('Object TorneoCategoria does not exist (%s).', $request->getParameter('id_torneo_categoria')));
    $TorneoCategoria->delete();

    $this->redirect('torneo_categoria_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $TorneoCategoria = $form->save();

      $this->redirect('torneo_categoria_abm/edit?id_torneo_categoria='.$TorneoCategoria->getIdTorneoCategoria());
    }
  }
}
