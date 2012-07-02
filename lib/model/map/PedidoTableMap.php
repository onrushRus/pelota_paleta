<?php



/**
 * This class defines the structure of the 'pedido' table.
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
class PedidoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PedidoTableMap';

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
		$this->setName('pedido');
		$this->setPhpName('Pedido');
		$this->setClassname('Pedido');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->getColumn('ID', false)->setPrimaryString(true);
		$this->addForeignKey('PROVEEDOR_ID', 'ProveedorId', 'INTEGER', 'proveedor', 'ID', true, 10, null);
		$this->addColumn('FECHA_PEDIDO', 'FechaPedido', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Proveedor', 'Proveedor', RelationMap::MANY_TO_ONE, array('proveedor_id' => 'id', ), null, null);
		$this->addRelation('PedidoProducto', 'PedidoProducto', RelationMap::ONE_TO_MANY, array('id' => 'pedido_id', ), null, null, 'PedidoProductos');
		$this->addRelation('Producto', 'Producto', RelationMap::MANY_TO_MANY, array(), null, null, 'Productos');
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

} // PedidoTableMap
