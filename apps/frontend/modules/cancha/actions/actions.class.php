<?php

/**
 * cancha actions.
 *
 * @package    pelota_paleta
 * @subpackage cancha
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class canchaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

  }
  
    public function executeReserva(sfWebRequest $request)
  {
      if($request->isMethod(sfWebRequest::POST))
      {
          $this->reserva = new Reserva();
          $this->reserva->setSocioNroDoc('dni_socio');
      }
          

  }
 
    public function executeAbonaReserva(sfWebRequest $request)
  {

  }
  
    public function executeCancelaReserva(sfWebRequest $request)
  {

  }
  
}
