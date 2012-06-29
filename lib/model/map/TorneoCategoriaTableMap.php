<?php



/**
 * This class defines the structure of the 'torneo_categoria' table.
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
class TorneoCategoriaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TorneoCategoriaTableMap';

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
		$this->setName('torneo_categoria');
		$this->setPhpName('TorneoCategoria');
		$this->setClassname('TorneoCategoria');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_TORNEO_CATEGORIA', 'IdTorneoCategoria', 'INTEGER', true, 10, null);
		$this->addForeignKey('TORNEO_ID', 'TorneoId', 'INTEGER', 'torneo', 'ID', true, 10, null);
		$this->addForeignKey('CATEGORIA_ID', 'CategoriaId', 'INTEGER', 'categoria', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Torneo', 'Torneo', RelationMap::MANY_TO_ONE, array('torneo_id' => 'id', ), null, null);
		$this->addRelation('Categoria', 'Categoria', RelationMap::MANY_TO_ONE, array('categoria_id' => 'id', ), null, null);
		$this->addRelation('Inscripto', 'Inscripto', RelationMap::ONE_TO_MANY, array('id_torneo_categoria' => 'torneo_cat_id', ), null, null, 'Inscriptos');
		$this->addRelation('ResultadoTorneo', 'ResultadoTorneo', RelationMap::ONE_TO_MANY, array('id_torneo_categoria' => 'torneo_cat_id', ), null, null, 'ResultadoTorneos');
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

} // TorneoCategoriaTableMap
