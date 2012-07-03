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
      $this->widgetSchema['persona_nro_doc']= new sfWidgetFormInputText();
      $this->validatorSchema['persona_nro_doc'] = new sfValidatorInteger();
      
      $this->widgetSchema['torneo_cat_id']->setOption('query_methods', array('joinWithCategoria','joinWithTorneo'));
      $this->widgetSchema['torneo_cat_id']->setOption('method','getTorncat');
      
      $this->validatorSchema['persona_nro_doc']->setMessage('invalid', 'Nro de documento no valido');
      
      $this->validatorSchema['torneo_cat_id']->setMessage('invalid', 'Ya esta inscripto en esta categoria');
      
      $this->validatorSchema['nro_equipo'] = new sfValidatorInteger();
      $this->validatorSchema['nro_equipo']->setOption('min', 0);
      $this->validatorSchema['nro_equipo']->setMessage('min', 'Nro de equipo debe ser positivo');
      $this->validatorSchema['nro_equipo']->setOption('max', 100);
      $this->validatorSchema['nro_equipo']->setMessage('max', 'Nro de equipo demaciado alto');
      $this->validatorSchema['nro_equipo']->setMessage('invalid', 'Equipo debe ser un numero');
      
      $this->widgetSchema->setLabels(array(
          'persona_nro_doc' => 'Nro Documento',
          'torneo_cat_id' => 'Torneo-Categoria',
          'nro_equipo' => 'Equipo',
          'club_representado' => 'Club',
      ));
  }
}
