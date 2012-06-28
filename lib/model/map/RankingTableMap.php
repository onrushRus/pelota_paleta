<?php



/**
 * This class defines the structure of the 'ranking' table.
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
class RankingTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RankingTableMap';

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
		$this->setName('ranking');
		$this->setPhpName('Ranking');
		$this->setClassname('Ranking');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PELOTARI_NRO_DOC', 'PelotariNroDoc', 'INTEGER' , 'inscripto', 'PERSONA_NRO_DOC', true, 10, null);
		$this->addPrimaryKey('TIPO_RANKING', 'TipoRanking', 'BOOLEAN', true, 1, false);
		$this->addForeignPrimaryKey('CATEGORIA_ID', 'CategoriaId', 'INTEGER' , 'categoria', 'ID', true, 10, 0);
		$this->addColumn('PELOTARI_PUNTOS', 'PelotariPuntos', 'INTEGER', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Inscripto', 'Inscripto', RelationMap::MANY_TO_ONE, array('pelotari_nro_doc' => 'persona_nro_doc', ), null, null);
		$this->addRelation('Categoria', 'Categoria', RelationMap::MANY_TO_ONE, array('categoria_id' => 'id', ), null, null);
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

} // RankingTableMap
