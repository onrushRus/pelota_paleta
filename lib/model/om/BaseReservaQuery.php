<?php


/**
 * Base class that represents a query for the 'reserva' table.
 *
 * 
 *
 * @method     ReservaQuery orderBySocioNroDoc($order = Criteria::ASC) Order by the socio_nro_doc column
 * @method     ReservaQuery orderByTipoReservaId($order = Criteria::ASC) Order by the tipo_reserva_id column
 * @method     ReservaQuery orderByDiaComienzoReserva($order = Criteria::ASC) Order by the dia_comienzo_reserva column
 * @method     ReservaQuery orderByHoraComienzoReserva($order = Criteria::ASC) Order by the hora_comienzo_reserva column
 * @method     ReservaQuery orderByDiaFinReserva($order = Criteria::ASC) Order by the dia_fin_reserva column
 * @method     ReservaQuery orderByHoraFinReserva($order = Criteria::ASC) Order by the hora_fin_reserva column
 * @method     ReservaQuery orderByCantidadTurnos($order = Criteria::ASC) Order by the cantidad_turnos column
 * @method     ReservaQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 *
 * @method     ReservaQuery groupBySocioNroDoc() Group by the socio_nro_doc column
 * @method     ReservaQuery groupByTipoReservaId() Group by the tipo_reserva_id column
 * @method     ReservaQuery groupByDiaComienzoReserva() Group by the dia_comienzo_reserva column
 * @method     ReservaQuery groupByHoraComienzoReserva() Group by the hora_comienzo_reserva column
 * @method     ReservaQuery groupByDiaFinReserva() Group by the dia_fin_reserva column
 * @method     ReservaQuery groupByHoraFinReserva() Group by the hora_fin_reserva column
 * @method     ReservaQuery groupByCantidadTurnos() Group by the cantidad_turnos column
 * @method     ReservaQuery groupByEstado() Group by the estado column
 *
 * @method     ReservaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ReservaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ReservaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ReservaQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     ReservaQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     ReservaQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     ReservaQuery leftJoinTipoReserva($relationAlias = null) Adds a LEFT JOIN clause to the query using the TipoReserva relation
 * @method     ReservaQuery rightJoinTipoReserva($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TipoReserva relation
 * @method     ReservaQuery innerJoinTipoReserva($relationAlias = null) Adds a INNER JOIN clause to the query using the TipoReserva relation
 *
 * @method     Reserva findOne(PropelPDO $con = null) Return the first Reserva matching the query
 * @method     Reserva findOneOrCreate(PropelPDO $con = null) Return the first Reserva matching the query, or a new Reserva object populated from the query conditions when no match is found
 *
 * @method     Reserva findOneBySocioNroDoc(int $socio_nro_doc) Return the first Reserva filtered by the socio_nro_doc column
 * @method     Reserva findOneByTipoReservaId(int $tipo_reserva_id) Return the first Reserva filtered by the tipo_reserva_id column
 * @method     Reserva findOneByDiaComienzoReserva(string $dia_comienzo_reserva) Return the first Reserva filtered by the dia_comienzo_reserva column
 * @method     Reserva findOneByHoraComienzoReserva(string $hora_comienzo_reserva) Return the first Reserva filtered by the hora_comienzo_reserva column
 * @method     Reserva findOneByDiaFinReserva(string $dia_fin_reserva) Return the first Reserva filtered by the dia_fin_reserva column
 * @method     Reserva findOneByHoraFinReserva(string $hora_fin_reserva) Return the first Reserva filtered by the hora_fin_reserva column
 * @method     Reserva findOneByCantidadTurnos(int $cantidad_turnos) Return the first Reserva filtered by the cantidad_turnos column
 * @method     Reserva findOneByEstado(boolean $estado) Return the first Reserva filtered by the estado column
 *
 * @method     array findBySocioNroDoc(int $socio_nro_doc) Return Reserva objects filtered by the socio_nro_doc column
 * @method     array findByTipoReservaId(int $tipo_reserva_id) Return Reserva objects filtered by the tipo_reserva_id column
 * @method     array findByDiaComienzoReserva(string $dia_comienzo_reserva) Return Reserva objects filtered by the dia_comienzo_reserva column
 * @method     array findByHoraComienzoReserva(string $hora_comienzo_reserva) Return Reserva objects filtered by the hora_comienzo_reserva column
 * @method     array findByDiaFinReserva(string $dia_fin_reserva) Return Reserva objects filtered by the dia_fin_reserva column
 * @method     array findByHoraFinReserva(string $hora_fin_reserva) Return Reserva objects filtered by the hora_fin_reserva column
 * @method     array findByCantidadTurnos(int $cantidad_turnos) Return Reserva objects filtered by the cantidad_turnos column
 * @method     array findByEstado(boolean $estado) Return Reserva objects filtered by the estado column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseReservaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseReservaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Reserva', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ReservaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ReservaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ReservaQuery) {
			return $criteria;
		}
		$query = new ReservaQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj = $c->findPk(array(12, 34, 56, 78), $con);
	 * </code>
	 *
	 * @param     array[$socio_nro_doc, $tipo_reserva_id, $dia_comienzo_reserva, $hora_comienzo_reserva] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Reserva|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ReservaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2], (string) $key[3]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ReservaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Reserva A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `SOCIO_NRO_DOC`, `TIPO_RESERVA_ID`, `DIA_COMIENZO_RESERVA`, `HORA_COMIENZO_RESERVA`, `DIA_FIN_RESERVA`, `HORA_FIN_RESERVA`, `CANTIDAD_TURNOS`, `ESTADO` FROM `reserva` WHERE `SOCIO_NRO_DOC` = :p0 AND `TIPO_RESERVA_ID` = :p1 AND `DIA_COMIENZO_RESERVA` = :p2 AND `HORA_COMIENZO_RESERVA` = :p3';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
			$stmt->bindValue(':p3', $key[3], PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Reserva();
			$obj->hydrate($row);
			ReservaPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2], (string) $key[3])));
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Reserva|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ReservaPeer::SOCIO_NRO_DOC, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ReservaPeer::TIPO_RESERVA_ID, $key[1], Criteria::EQUAL);
		$this->addUsingAlias(ReservaPeer::DIA_COMIENZO_RESERVA, $key[2], Criteria::EQUAL);
		$this->addUsingAlias(ReservaPeer::HORA_COMIENZO_RESERVA, $key[3], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ReservaPeer::SOCIO_NRO_DOC, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ReservaPeer::TIPO_RESERVA_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$cton2 = $this->getNewCriterion(ReservaPeer::DIA_COMIENZO_RESERVA, $key[2], Criteria::EQUAL);
			$cton0->addAnd($cton2);
			$cton3 = $this->getNewCriterion(ReservaPeer::HORA_COMIENZO_RESERVA, $key[3], Criteria::EQUAL);
			$cton0->addAnd($cton3);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the socio_nro_doc column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySocioNroDoc(1234); // WHERE socio_nro_doc = 1234
	 * $query->filterBySocioNroDoc(array(12, 34)); // WHERE socio_nro_doc IN (12, 34)
	 * $query->filterBySocioNroDoc(array('min' => 12)); // WHERE socio_nro_doc > 12
	 * </code>
	 *
	 * @see       filterBySocio()
	 *
	 * @param     mixed $socioNroDoc The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterBySocioNroDoc($socioNroDoc = null, $comparison = null)
	{
		if (is_array($socioNroDoc) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ReservaPeer::SOCIO_NRO_DOC, $socioNroDoc, $comparison);
	}

	/**
	 * Filter the query on the tipo_reserva_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoReservaId(1234); // WHERE tipo_reserva_id = 1234
	 * $query->filterByTipoReservaId(array(12, 34)); // WHERE tipo_reserva_id IN (12, 34)
	 * $query->filterByTipoReservaId(array('min' => 12)); // WHERE tipo_reserva_id > 12
	 * </code>
	 *
	 * @see       filterByTipoReserva()
	 *
	 * @param     mixed $tipoReservaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByTipoReservaId($tipoReservaId = null, $comparison = null)
	{
		if (is_array($tipoReservaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ReservaPeer::TIPO_RESERVA_ID, $tipoReservaId, $comparison);
	}

	/**
	 * Filter the query on the dia_comienzo_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiaComienzoReserva('2011-03-14'); // WHERE dia_comienzo_reserva = '2011-03-14'
	 * $query->filterByDiaComienzoReserva('now'); // WHERE dia_comienzo_reserva = '2011-03-14'
	 * $query->filterByDiaComienzoReserva(array('max' => 'yesterday')); // WHERE dia_comienzo_reserva > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $diaComienzoReserva The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByDiaComienzoReserva($diaComienzoReserva = null, $comparison = null)
	{
		if (is_array($diaComienzoReserva)) {
			$useMinMax = false;
			if (isset($diaComienzoReserva['min'])) {
				$this->addUsingAlias(ReservaPeer::DIA_COMIENZO_RESERVA, $diaComienzoReserva['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($diaComienzoReserva['max'])) {
				$this->addUsingAlias(ReservaPeer::DIA_COMIENZO_RESERVA, $diaComienzoReserva['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservaPeer::DIA_COMIENZO_RESERVA, $diaComienzoReserva, $comparison);
	}

	/**
	 * Filter the query on the hora_comienzo_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHoraComienzoReserva('2011-03-14'); // WHERE hora_comienzo_reserva = '2011-03-14'
	 * $query->filterByHoraComienzoReserva('now'); // WHERE hora_comienzo_reserva = '2011-03-14'
	 * $query->filterByHoraComienzoReserva(array('max' => 'yesterday')); // WHERE hora_comienzo_reserva > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $horaComienzoReserva The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByHoraComienzoReserva($horaComienzoReserva = null, $comparison = null)
	{
		if (is_array($horaComienzoReserva)) {
			$useMinMax = false;
			if (isset($horaComienzoReserva['min'])) {
				$this->addUsingAlias(ReservaPeer::HORA_COMIENZO_RESERVA, $horaComienzoReserva['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($horaComienzoReserva['max'])) {
				$this->addUsingAlias(ReservaPeer::HORA_COMIENZO_RESERVA, $horaComienzoReserva['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservaPeer::HORA_COMIENZO_RESERVA, $horaComienzoReserva, $comparison);
	}

	/**
	 * Filter the query on the dia_fin_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiaFinReserva('2011-03-14'); // WHERE dia_fin_reserva = '2011-03-14'
	 * $query->filterByDiaFinReserva('now'); // WHERE dia_fin_reserva = '2011-03-14'
	 * $query->filterByDiaFinReserva(array('max' => 'yesterday')); // WHERE dia_fin_reserva > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $diaFinReserva The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByDiaFinReserva($diaFinReserva = null, $comparison = null)
	{
		if (is_array($diaFinReserva)) {
			$useMinMax = false;
			if (isset($diaFinReserva['min'])) {
				$this->addUsingAlias(ReservaPeer::DIA_FIN_RESERVA, $diaFinReserva['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($diaFinReserva['max'])) {
				$this->addUsingAlias(ReservaPeer::DIA_FIN_RESERVA, $diaFinReserva['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservaPeer::DIA_FIN_RESERVA, $diaFinReserva, $comparison);
	}

	/**
	 * Filter the query on the hora_fin_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHoraFinReserva('2011-03-14'); // WHERE hora_fin_reserva = '2011-03-14'
	 * $query->filterByHoraFinReserva('now'); // WHERE hora_fin_reserva = '2011-03-14'
	 * $query->filterByHoraFinReserva(array('max' => 'yesterday')); // WHERE hora_fin_reserva > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $horaFinReserva The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByHoraFinReserva($horaFinReserva = null, $comparison = null)
	{
		if (is_array($horaFinReserva)) {
			$useMinMax = false;
			if (isset($horaFinReserva['min'])) {
				$this->addUsingAlias(ReservaPeer::HORA_FIN_RESERVA, $horaFinReserva['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($horaFinReserva['max'])) {
				$this->addUsingAlias(ReservaPeer::HORA_FIN_RESERVA, $horaFinReserva['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservaPeer::HORA_FIN_RESERVA, $horaFinReserva, $comparison);
	}

	/**
	 * Filter the query on the cantidad_turnos column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCantidadTurnos(1234); // WHERE cantidad_turnos = 1234
	 * $query->filterByCantidadTurnos(array(12, 34)); // WHERE cantidad_turnos IN (12, 34)
	 * $query->filterByCantidadTurnos(array('min' => 12)); // WHERE cantidad_turnos > 12
	 * </code>
	 *
	 * @param     mixed $cantidadTurnos The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByCantidadTurnos($cantidadTurnos = null, $comparison = null)
	{
		if (is_array($cantidadTurnos)) {
			$useMinMax = false;
			if (isset($cantidadTurnos['min'])) {
				$this->addUsingAlias(ReservaPeer::CANTIDAD_TURNOS, $cantidadTurnos['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cantidadTurnos['max'])) {
				$this->addUsingAlias(ReservaPeer::CANTIDAD_TURNOS, $cantidadTurnos['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservaPeer::CANTIDAD_TURNOS, $cantidadTurnos, $comparison);
	}

	/**
	 * Filter the query on the estado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEstado(true); // WHERE estado = true
	 * $query->filterByEstado('yes'); // WHERE estado = true
	 * </code>
	 *
	 * @param     boolean|string $estado The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByEstado($estado = null, $comparison = null)
	{
		if (is_string($estado)) {
			$estado = in_array(strtolower($estado), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ReservaPeer::ESTADO, $estado, $comparison);
	}

	/**
	 * Filter the query by a related Socio object
	 *
	 * @param     Socio|PropelCollection $socio The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterBySocio($socio, $comparison = null)
	{
		if ($socio instanceof Socio) {
			return $this
				->addUsingAlias(ReservaPeer::SOCIO_NRO_DOC, $socio->getPersonaNroDoc(), $comparison);
		} elseif ($socio instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ReservaPeer::SOCIO_NRO_DOC, $socio->toKeyValue('PrimaryKey', 'PersonaNroDoc'), $comparison);
		} else {
			throw new PropelException('filterBySocio() only accepts arguments of type Socio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Socio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function joinSocio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Socio');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Socio');
		}

		return $this;
	}

	/**
	 * Use the Socio relation Socio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SocioQuery A secondary query class using the current class as primary query
	 */
	public function useSocioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSocio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Socio', 'SocioQuery');
	}

	/**
	 * Filter the query by a related TipoReserva object
	 *
	 * @param     TipoReserva|PropelCollection $tipoReserva The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function filterByTipoReserva($tipoReserva, $comparison = null)
	{
		if ($tipoReserva instanceof TipoReserva) {
			return $this
				->addUsingAlias(ReservaPeer::TIPO_RESERVA_ID, $tipoReserva->getId(), $comparison);
		} elseif ($tipoReserva instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ReservaPeer::TIPO_RESERVA_ID, $tipoReserva->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTipoReserva() only accepts arguments of type TipoReserva or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TipoReserva relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function joinTipoReserva($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TipoReserva');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'TipoReserva');
		}

		return $this;
	}

	/**
	 * Use the TipoReserva relation TipoReserva object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TipoReservaQuery A secondary query class using the current class as primary query
	 */
	public function useTipoReservaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTipoReserva($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TipoReserva', 'TipoReservaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Reserva $reserva Object to remove from the list of results
	 *
	 * @return    ReservaQuery The current query, for fluid interface
	 */
	public function prune($reserva = null)
	{
		if ($reserva) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ReservaPeer::SOCIO_NRO_DOC), $reserva->getSocioNroDoc(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ReservaPeer::TIPO_RESERVA_ID), $reserva->getTipoReservaId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond2', $this->getAliasedColName(ReservaPeer::DIA_COMIENZO_RESERVA), $reserva->getDiaComienzoReserva(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond3', $this->getAliasedColName(ReservaPeer::HORA_COMIENZO_RESERVA), $reserva->getHoraComienzoReserva(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseReservaQuery