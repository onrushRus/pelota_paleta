<?php



/**
 * This class defines the structure of the 'cuerpo_pedido' table.
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
class CuerpoPedidoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CuerpoPedidoTableMap';

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
		$this->setName('cuerpo_pedido');
		$this->setPhpName('CuerpoPedido');
		$this->setClassname('CuerpoPedido');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignKey('ENCABEZADO_PEDIDO_ID', 'EncabezadoPedidoId', 'INTEGER', 'encabezado_pedido', 'ID', true, 10, null);
		$this->addForeignKey('PRODUCTO_ID', 'ProductoId', 'INTEGER', 'producto', 'ID', true, 10, null);
		$this->addColumn('CANTIDAD', 'Cantidad', 'INTEGER', true, 10, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('EncabezadoPedido', 'EncabezadoPedido', RelationMap::MANY_TO_ONE, array('encabezado_pedido_id' => 'id', ), null, null);
		$this->addRelation('Producto', 'Producto', RelationMap::MANY_TO_ONE, array('producto_id' => 'id', ), null, null);
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

} // CuerpoPedidoTableMap
