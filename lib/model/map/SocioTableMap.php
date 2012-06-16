<?php



/**
 * This class defines the structure of the 'socio' table.
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
class SocioTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SocioTableMap';

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
		$this->setName('socio');
		$this->setPhpName('Socio');
		$this->setClassname('Socio');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PERSONA_NRO_DOC', 'PersonaNroDoc', 'INTEGER' , 'persona', 'NRO_DOC', true, 10, 0);
		$this->addColumn('FECHA_ALTA', 'FechaAlta', 'TIMESTAMP', true, null, null);
		$this->addColumn('VITALICIO', 'Vitalicio', 'BOOLEAN', true, 1, false);
		$this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', true, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Persona', 'Persona', RelationMap::MANY_TO_ONE, array('persona_nro_doc' => 'nro_doc', ), null, null);
		$this->addRelation('Reserva', 'Reserva', RelationMap::ONE_TO_MANY, array('persona_nro_doc' => 'socio_nro_doc', ), null, null, 'Reservas');
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

} // SocioTableMap
