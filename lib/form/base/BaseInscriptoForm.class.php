<?php

/**
 * Inscripto form base class.
 *
 * @method Inscripto getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseInscriptoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'persona_nro_doc'   => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => false)),
      'torneo_cat_id'     => new sfWidgetFormPropelChoice(array('model' => 'TorneoCategoria', 'add_empty' => false)),
      'nro_equipo'        => new sfWidgetFormInputText(),
      'club_representado' => new sfWidgetFormPropelChoice(array('model' => 'Club', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'persona_nro_doc'   => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'nro_doc')),
      'torneo_cat_id'     => new sfValidatorPropelChoice(array('model' => 'TorneoCategoria', 'column' => 'id_torneo_categoria')),
      'nro_equipo'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'club_representado' => new sfValidatorPropelChoice(array('model' => 'Club', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Inscripto', 'column' => array('torneo_cat_id', 'persona_nro_doc')))
    );

    $this->widgetSchema->setNameFormat('inscripto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inscripto';
  }


}
