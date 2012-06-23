<?php



/**
 * This class defines the structure of the 'resultado_torneo' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ResultadoTorneoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ResultadoTorneoTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('resultado_torneo');
		$this->setPhpName('ResultadoTorneo');
		$this->setClassname('ResultadoTorneo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('PUESTO_ID', 'PuestoId', 'INTEGER', 'puntos_puesto', 'ID', true, 10, null);
		$this->addForeignKey('TORNEO_CAT_ID', 'TorneoCatId', 'INTEGER', 'torneo_categoria', 'ID_TORNEO_CATEGORIA', true, 10, null);
		$this->addForeignKey('PELOTARI_NRO_DOC', 'PelotariNroDoc', 'INTEGER', 'inscripto', 'PERSONA_NRO_DOC', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('PuntosPuesto', 'PuntosPuesto', RelationMap::MANY_TO_ONE, array('puesto_id' => 'id', ), null, null);
		$this->addRelation('TorneoCategoria', 'TorneoCategoria', RelationMap::MANY_TO_ONE, array('torneo_cat_id' => 'id_torneo_categoria', ), null, null);
		$this->addRelation('Inscripto', 'Inscripto', RelationMap::MANY_TO_ONE, array('pelotari_nro_doc' => 'persona_nro_doc', ), null, null);
	} // buildRelations()

	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // ResultadoTorneoTableMap
