<?php



/**
 * This class defines the structure of the 'encabezado_pedido' table.
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
class EncabezadoPedidoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.EncabezadoPedidoTableMap';

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
		$this->setName('encabezado_pedido');
		$this->setPhpName('EncabezadoPedido');
		$this->setClassname('EncabezadoPedido');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('PROVEEDOR_ID', 'ProveedorId', 'INTEGER', 'proveedor', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Proveedor', 'Proveedor', RelationMap::MANY_TO_ONE, array('proveedor_id' => 'id', ), null, null);
		$this->addRelation('CuerpoPedido', 'CuerpoPedido', RelationMap::ONE_TO_MANY, array('id' => 'encabezado_pedido_id', ), null, null, 'CuerpoPedidos');
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

} // EncabezadoPedidoTableMap
