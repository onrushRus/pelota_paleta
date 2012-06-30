<?php

/**
 * Inscripto form.
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
class InscriptoForm extends BaseInscriptoForm
{
  public function configure()
  {
      
      
      //$this->widgetSchema['torneo_cat_id']->setOption('query_methods', array('joinWithTorneo'));
      //$this->widgetSchema['torneo_cat_id']->setOption('method', 'getTorneo');
 /*     
  public function setOption($name, $value,$name2,$value2)
  {
    $this->options[$name] = $value;

    return $this;
  }*/
      $this->widgetSchema['torneo_cat_id']->setOption('query_methods', array('joinWithCategoria','joinWithTorneo'));
      $this->widgetSchema['torneo_cat_id']->setOption('method','getTorncat');
      
      $this->widgetSchema->setLabels(array(
          'persona_nro_doc' => 'Nro Documento',
          'torneo_cat_id' => 'Torneo-Ctegoria',
          'nro_equipo' => 'Equipo',
          'club_representado' => 'Club',
      ));
  }
}
