<?php

/**
 * ResultadoTorneo form base class.
 *
 * @method ResultadoTorneo getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseResultadoTorneoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'puesto_id'        => new sfWidgetFormPropelChoice(array('model' => 'PuntosPuesto', 'add_empty' => false)),
      'torneo_cat_id'    => new sfWidgetFormPropelChoice(array('model' => 'TorneoCategoria', 'add_empty' => false)),
      'pelotari_nro_doc' => new sfWidgetFormPropelChoice(array('model' => 'Inscripto', 'add_empty' => false, 'key_method' => 'getPersonaNroDoc')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'puesto_id'        => new sfValidatorPropelChoice(array('model' => 'PuntosPuesto', 'column' => 'id')),
      'torneo_cat_id'    => new sfValidatorPropelChoice(array('model' => 'TorneoCategoria', 'column' => 'id_torneo_categoria')),
      'pelotari_nro_doc' => new sfValidatorPropelChoice(array('model' => 'Inscripto', 'column' => 'persona_nro_doc')),
    ));

    $this->widgetSchema->setNameFormat('resultado_torneo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ResultadoTorneo';
  }


}
