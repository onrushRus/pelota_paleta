<?php



/**
 * This class defines the structure of the 'categoria' table.
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
class CategoriaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CategoriaTableMap';

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
		$this->setName('categoria');
		$this->setPhpName('Categoria');
		$this->setClassname('Categoria');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('DESCRIPCION_CATEGORIA', 'DescripcionCategoria', 'VARCHAR', true, 40, null);
		$this->getColumn('DESCRIPCION_CATEGORIA', false)->setPrimaryString(true);
		$this->addColumn('EDAD_MIN', 'EdadMin', 'INTEGER', true, 10, null);
		$this->addColumn('EDAD_MAX', 'EdadMax', 'INTEGER', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Ranking', 'Ranking', RelationMap::ONE_TO_MANY, array('id' => 'categoria_id', ), null, null, 'Rankings');
		$this->addRelation('TorneoCategoria', 'TorneoCategoria', RelationMap::ONE_TO_MANY, array('id' => 'categoria_id', ), null, null, 'TorneoCategorias');
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

} // CategoriaTableMap
