<?php



/**
 * This class defines the structure of the 'persona' table.
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
class PersonaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PersonaTableMap';

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
		$this->setName('persona');
		$this->setPhpName('Persona');
		$this->setClassname('Persona');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('NRO_DOC', 'NroDoc', 'INTEGER', true, 10, 0);
		$this->addColumn('NOM_APELLIDO', 'NomApellido', 'VARCHAR', true, 45, null);
		$this->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'DATE', true, null, null);
		$this->addColumn('E_MAIL', 'EMail', 'VARCHAR', true, 30, null);
		$this->addForeignKey('LOCALIDAD_ID', 'LocalidadId', 'INTEGER', 'localidad', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Localidad', 'Localidad', RelationMap::MANY_TO_ONE, array('localidad_id' => 'id', ), 'CASCADE', 'CASCADE');
		$this->addRelation('Direccion', 'Direccion', RelationMap::ONE_TO_MANY, array('nro_doc' => 'persona_nro_doc', ), null, null, 'Direccions');
		$this->addRelation('Socio', 'Socio', RelationMap::ONE_TO_ONE, array('nro_doc' => 'persona_nro_doc', ), null, null);
		$this->addRelation('Telefono', 'Telefono', RelationMap::ONE_TO_MANY, array('nro_doc' => 'persona_nro_doc', ), null, null, 'Telefonos');
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

} // PersonaTableMap
