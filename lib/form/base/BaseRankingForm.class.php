<?php

/**
 * Ranking form base class.
 *
 * @method Ranking getObject() Returns the current form's model object
 *
 * @package    pelota_paleta
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRankingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pelotari_nro_doc' => new sfWidgetFormInputHidden(),
      'tipo_ranking'     => new sfWidgetFormInputHidden(),
      'categoria_id'     => new sfWidgetFormInputHidden(),
      'pelotari_puntos'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'pelotari_nro_doc' => new sfValidatorPropelChoice(array('model' => 'Inscripto', 'column' => 'persona_nro_doc', 'required' => false)),
      'tipo_ranking'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getTipoRanking()), 'empty_value' => $this->getObject()->getTipoRanking(), 'required' => false)),
      'categoria_id'     => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id', 'required' => false)),
      'pelotari_puntos'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('ranking[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ranking';
  }


}
