<?php

/**
 * ranking_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage ranking_abm
 * @author     Your name here
 */
class ranking_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Rankings = RankingQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RankingForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RankingForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Ranking = RankingQuery::create()->findPk($request->getParameter('pelotari_nro_doc'),
                             $request->getParameter('tipo_ranking'),
                             $request->getParameter('categoria_id'));
    $this->forward404Unless($Ranking, sprintf('Object Ranking does not exist (%s).', $request->getParameter('pelotari_nro_doc'),
                             $request->getParameter('tipo_ranking'),
                             $request->getParameter('categoria_id')));
    $this->form = new RankingForm($Ranking);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Ranking = RankingQuery::create()->findPk($request->getParameter('pelotari_nro_doc'),
                             $request->getParameter('tipo_ranking'),
                             $request->getParameter('categoria_id'));
    $this->forward404Unless($Ranking, sprintf('Object Ranking does not exist (%s).', $request->getParameter('pelotari_nro_doc'),
                             $request->getParameter('tipo_ranking'),
                             $request->getParameter('categoria_id')));
    $this->form = new RankingForm($Ranking);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Ranking = RankingQuery::create()->findPk($request->getParameter('pelotari_nro_doc'),
                             $request->getParameter('tipo_ranking'),
                             $request->getParameter('categoria_id'));
    $this->forward404Unless($Ranking, sprintf('Object Ranking does not exist (%s).', $request->getParameter('pelotari_nro_doc'),
                             $request->getParameter('tipo_ranking'),
                             $request->getParameter('categoria_id')));
    $Ranking->delete();

    $this->redirect('ranking_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Ranking = $form->save();

      $this->redirect('ranking_abm/edit?pelotari_nro_doc='.$Ranking->getPelotariNroDoc().'&tipo_ranking='.$Ranking->getTipoRanking().'&categoria_id='.$Ranking->getCategoriaId());
    }
  }
}
