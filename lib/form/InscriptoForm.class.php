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
      $this->widgetSchema['torneo_cat_id']->setOption('query_methods', array('joinWithCategoria'));
      $this->widgetSchema['torneo_cat_id']->setOption('method', 'getCategoria');
      $this->widgetSchema->setLabels(array(
          'persona_nro_doc' => 'Nro Documento',
          'torneo_cat_id' => 'Torneo-Ctegoria',
          'nro_equipo' => 'Equipo',
          'club_representado' => 'Club',
      ));
  }
}
