<?php



/**
 * This class defines the structure of the 'producto' table.
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
class ProductoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProductoTableMap';

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
		$this->setName('producto');
		$this->setPhpName('Producto');
		$this->setClassname('Producto');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('DESCRIPCION_PROD', 'DescripcionProd', 'VARCHAR', true, 45, null);
		$this->getColumn('DESCRIPCION_PROD', false)->setPrimaryString(true);
		$this->addColumn('MARCA', 'Marca', 'VARCHAR', true, 45, null);
		$this->addColumn('PRESENTACION', 'Presentacion', 'VARCHAR', true, 45, null);
		$this->addColumn('PRECIO', 'Precio', 'DECIMAL', true, 6, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('PedidoProducto', 'PedidoProducto', RelationMap::ONE_TO_MANY, array('id' => 'producto_id', ), null, null, 'PedidoProductos');
		$this->addRelation('Stock', 'Stock', RelationMap::ONE_TO_ONE, array('id' => 'producto_id', ), 'CASCADE', 'CASCADE');
		$this->addRelation('Pedido', 'Pedido', RelationMap::MANY_TO_MANY, array(), 'CASCADE', 'CASCADE', 'Pedidos');
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

} // ProductoTableMap
