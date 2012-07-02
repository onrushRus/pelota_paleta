<?php

/**
 * Torneo form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class TorneoForm extends BaseTorneoForm
{
  public function configure()
  {
     // $arreglo= array('1'=>'nacional');
      //$this->widgetSchema['tipo_torneo']= new sfWidgetFormText();
      //$this->validatorSchema['tipo_torneo'] = new sfValidatorInteger();
      $this->embedRelation('TorneoCategoria');
       $this->widgetSchema->setLabels(array(
           'anio' => 'Año','tipo_torneo' => 'Nacional?',
       ));
  }
}
