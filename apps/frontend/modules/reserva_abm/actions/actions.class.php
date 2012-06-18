<?php

/**
 * reserva_abm actions.
 *
 * @package    pelota_paleta
 * @subpackage reserva_abm
 * @author     Your name here
 */
class reserva_abmActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Reservas = ReservaQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ReservaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ReservaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Reserva = ReservaQuery::create()->findPk($request->getParameter('socio_nro_doc'),
                             $request->getParameter('tipo_reserva_id'),
                             $request->getParameter('dia_comienzo_reserva'),
                             $request->getParameter('hora_comienzo_reserva'));
    $this->forward404Unless($Reserva, sprintf('Object Reserva does not exist (%s).', $request->getParameter('socio_nro_doc'),
                             $request->getParameter('tipo_reserva_id'),
                             $request->getParameter('dia_comienzo_reserva'),
                             $request->getParameter('hora_comienzo_reserva')));
    $this->form = new ReservaForm($Reserva);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Reserva = ReservaQuery::create()->findPk($request->getParameter('socio_nro_doc'),
                             $request->getParameter('tipo_reserva_id'),
                             $request->getParameter('dia_comienzo_reserva'),
                             $request->getParameter('hora_comienzo_reserva'));
    $this->forward404Unless($Reserva, sprintf('Object Reserva does not exist (%s).', $request->getParameter('socio_nro_doc'),
                             $request->getParameter('tipo_reserva_id'),
                             $request->getParameter('dia_comienzo_reserva'),
                             $request->getParameter('hora_comienzo_reserva')));
    $this->form = new ReservaForm($Reserva);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Reserva = ReservaQuery::create()->findPk($request->getParameter('socio_nro_doc'),
                             $request->getParameter('tipo_reserva_id'),
                             $request->getParameter('dia_comienzo_reserva'),
                             $request->getParameter('hora_comienzo_reserva'));
    $this->forward404Unless($Reserva, sprintf('Object Reserva does not exist (%s).', $request->getParameter('socio_nro_doc'),
                             $request->getParameter('tipo_reserva_id'),
                             $request->getParameter('dia_comienzo_reserva'),
                             $request->getParameter('hora_comienzo_reserva')));
    $Reserva->delete();

    $this->redirect('reserva_abm/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Reserva = $form->save();

      $this->redirect('reserva_abm/edit?socio_nro_doc='.$Reserva->getSocioNroDoc().'&tipo_reserva_id='.$Reserva->getTipoReservaId().'&dia_comienzo_reserva='.$Reserva->getDiaComienzoReserva().'&hora_comienzo_reserva='.$Reserva->getHoraComienzoReserva());
    }
  }
}
