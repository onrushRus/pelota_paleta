<?php



/**
 * This class defines the structure of the 'inscripto' table.
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
class InscriptoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.InscriptoTableMap';

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
		$this->setName('inscripto');
		$this->setPhpName('Inscripto');
		$this->setClassname('Inscripto');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('PERSONA_NRO_DOC', 'PersonaNroDoc', 'INTEGER', 'persona', 'NRO_DOC', true, 10, null);
		$this->addForeignKey('TORNEO_CAT_ID', 'TorneoCatId', 'INTEGER', 'torneo_categoria', 'ID_TORNEO_CATEGORIA', true, 10, null);
		$this->addColumn('NRO_EQUIPO', 'NroEquipo', 'INTEGER', true, 10, 0);
		$this->addForeignKey('CLUB_REPRESENTADO', 'ClubRepresentado', 'INTEGER', 'club', 'ID', false, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Persona', 'Persona', RelationMap::MANY_TO_ONE, array('persona_nro_doc' => 'nro_doc', ), 'CASCADE', 'CASCADE');
		$this->addRelation('TorneoCategoria', 'TorneoCategoria', RelationMap::MANY_TO_ONE, array('torneo_cat_id' => 'id_torneo_categoria', ), 'CASCADE', 'CASCADE');
		$this->addRelation('Club', 'Club', RelationMap::MANY_TO_ONE, array('club_representado' => 'id', ), 'SET NULL', 'CASCADE');
		$this->addRelation('Ranking', 'Ranking', RelationMap::ONE_TO_MANY, array('persona_nro_doc' => 'pelotari_nro_doc', ), null, null, 'Rankings');
		$this->addRelation('ResultadoTorneo', 'ResultadoTorneo', RelationMap::ONE_TO_MANY, array('persona_nro_doc' => 'pelotari_nro_doc', ), null, null, 'ResultadoTorneos');
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

} // InscriptoTableMap
