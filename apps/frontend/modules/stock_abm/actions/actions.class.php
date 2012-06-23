<?php

/**
 * stock_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage stock_abm
 * @author     Your name here
 */
class stock_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Stocks = StockQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StockForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StockForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Stock = StockQuery::create()->findPk($request->getParameter('producto_id'));
    $this->forward404Unless($Stock, sprintf('Object Stock does not exist (%s).', $request->getParameter('producto_id')));
    $this->form = new StockForm($Stock);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Stock = StockQuery::create()->findPk($request->getParameter('producto_id'));
    $this->forward404Unless($Stock, sprintf('Object Stock does not exist (%s).', $request->getParameter('producto_id')));
    $this->form = new StockForm($Stock);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Stock = StockQuery::create()->findPk($request->getParameter('producto_id'));
    $this->forward404Unless($Stock, sprintf('Object Stock does not exist (%s).', $request->getParameter('producto_id')));
    $Stock->delete();

    $this->redirect('stock_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Stock = $form->save();

      $this->redirect('stock_abm/edit?producto_id='.$Stock->getProductoId());
    }
  }
}
