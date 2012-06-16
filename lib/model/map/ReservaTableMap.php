<?php



/**
 * This class defines the structure of the 'reserva' table.
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
class ReservaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ReservaTableMap';

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
		$this->setName('reserva');
		$this->setPhpName('Reserva');
		$this->setClassname('Reserva');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('SOCIO_NRO_DOC', 'SocioNroDoc', 'INTEGER' , 'socio', 'PERSONA_NRO_DOC', true, 10, 0);
		$this->addForeignPrimaryKey('TIPO_RESERVA_ID', 'TipoReservaId', 'INTEGER' , 'tipo_reserva', 'ID', true, 10, 0);
		$this->addPrimaryKey('DIA_COMIENZO_RESERVA', 'DiaComienzoReserva', 'DATE', true, null, '0000-00-00');
		$this->addPrimaryKey('HORA_COMIENZO_RESERVA', 'HoraComienzoReserva', 'TIME', true, null, '00:00:00');
		$this->addColumn('DIA_FIN_RESERVA', 'DiaFinReserva', 'DATE', false, null, null);
		$this->addColumn('HORA_FIN_RESERVA', 'HoraFinReserva', 'TIME', false, null, null);
		$this->addColumn('CANTIDAD_TURNOS', 'CantidadTurnos', 'INTEGER', true, 10, 1);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Socio', 'Socio', RelationMap::MANY_TO_ONE, array('socio_nro_doc' => 'persona_nro_doc', ), null, null);
		$this->addRelation('TipoReserva', 'TipoReserva', RelationMap::MANY_TO_ONE, array('tipo_reserva_id' => 'id', ), null, null);
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

} // ReservaTableMap
