<?php



/**
 * This class defines the structure of the 'proveedor' table.
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
class ProveedorTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProveedorTableMap';

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
		$this->setName('proveedor');
		$this->setPhpName('Proveedor');
		$this->setClassname('Proveedor');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('NOMBRE_PROVEEDOR', 'NombreProveedor', 'VARCHAR', true, 45, null);
		$this->addColumn('DOM_CALLE', 'DomCalle', 'VARCHAR', false, 45, null);
		$this->addColumn('DOM_NRO', 'DomNro', 'VARCHAR', false, 10, null);
		$this->addColumn('DOM_PISO', 'DomPiso', 'VARCHAR', false, 10, null);
		$this->addColumn('DOM_DPTO', 'DomDpto', 'VARCHAR', false, 10, null);
		$this->addColumn('TELEFONO', 'Telefono', 'VARCHAR', true, 20, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('EncabezadoPedido', 'EncabezadoPedido', RelationMap::ONE_TO_MANY, array('id' => 'proveedor_id', ), null, null, 'EncabezadoPedidos');
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

} // ProveedorTableMap
