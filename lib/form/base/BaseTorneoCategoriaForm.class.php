<?php

/**
 * TorneoCategoria form base class.
 *
 * @method TorneoCategoria getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTorneoCategoriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_torneo_categoria' => new sfWidgetFormInputHidden(),
      'torneo_id'           => new sfWidgetFormPropelChoice(array('model' => 'Torneo', 'add_empty' => false)),
      'categoria_id'        => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_torneo_categoria' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdTorneoCategoria()), 'empty_value' => $this->getObject()->getIdTorneoCategoria(), 'required' => false)),
      'torneo_id'           => new sfValidatorPropelChoice(array('model' => 'Torneo', 'column' => 'id')),
      'categoria_id'        => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('torneo_categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TorneoCategoria';
  }


}
