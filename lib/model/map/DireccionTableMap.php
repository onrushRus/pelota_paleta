<?php



/**
 * This class defines the structure of the 'direccion' table.
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
class DireccionTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DireccionTableMap';

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
		$this->setName('direccion');
		$this->setPhpName('Direccion');
		$this->setClassname('Direccion');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PERSONA_NRO_DOC', 'PersonaNroDoc', 'INTEGER' , 'persona', 'NRO_DOC', true, 10, null);
		$this->addPrimaryKey('CALLE', 'Calle', 'VARCHAR', true, 45, 'Sin Nombre');
		$this->addPrimaryKey('NUMERO', 'Numero', 'INTEGER', true, 10, 0);
		$this->addColumn('MONOBLOCK_EDIF', 'MonoblockEdif', 'VARCHAR', false, 5, 'S/N');
		$this->addColumn('PISO', 'Piso', 'VARCHAR', false, 3, 'S/N');
		$this->addColumn('DPTO', 'Dpto', 'VARCHAR', false, 3, 'S/N');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Persona', 'Persona', RelationMap::MANY_TO_ONE, array('persona_nro_doc' => 'nro_doc', ), null, null);
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

} // DireccionTableMap
