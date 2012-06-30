<?php

/**
 * ResultadoTorneo form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class ResultadoTorneoForm extends BaseResultadoTorneoForm
{
  public function configure()
  {
      $this->widgetSchema['pelotari_nro_doc']->setOption('query_methods', array('joinWithPersona'));
      $this->widgetSchema['pelotari_nro_doc']->setOption('method', 'getPersona');
      //$this->widgetSchema['torneo_cat_id']->setOption('query_methods', array('joinWithPersona'));
      $this->widgetSchema['torneo_cat_id']->setOption('method', 'getTorncat');
      
      
       $this->widgetSchema->setLabels(array(
          'torneo_cat_id' => 'Torne-Categoria', 
          'pelotari_nro_doc' => 'Nro documentado participante', 
       ));
  }
}
