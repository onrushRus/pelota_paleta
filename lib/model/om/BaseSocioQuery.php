<?php


/**
 * Base class that represents a query for the 'socio' table.
 *
 * 
 *
 * @method     SocioQuery orderByPersonaNroDoc($order = Criteria::ASC) Order by the persona_nro_doc column
 * @method     SocioQuery orderByFechaAlta($order = Criteria::ASC) Order by the fecha_alta column
 * @method     SocioQuery orderByVitalicio($order = Criteria::ASC) Order by the vitalicio column
 * @method     SocioQuery orderByActivo($order = Criteria::ASC) Order by the activo column
 *
 * @method     SocioQuery groupByPersonaNroDoc() Group by the persona_nro_doc column
 * @method     SocioQuery groupByFechaAlta() Group by the fecha_alta column
 * @method     SocioQuery groupByVitalicio() Group by the vitalicio column
 * @method     SocioQuery groupByActivo() Group by the activo column
 *
 * @method     SocioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SocioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SocioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SocioQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     SocioQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     SocioQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     SocioQuery leftJoinReserva($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reserva relation
 * @method     SocioQuery rightJoinReserva($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reserva relation
 * @method     SocioQuery innerJoinReserva($relationAlias = null) Adds a INNER JOIN clause to the query using the Reserva relation
 *
 * @method     Socio findOne(PropelPDO $con = null) Return the first Socio matching the query
 * @method     Socio findOneOrCreate(PropelPDO $con = null) Return the first Socio matching the query, or a new Socio object populated from the query conditions when no match is found
 *
 * @method     Socio findOneByPersonaNroDoc(int $persona_nro_doc) Return the first Socio filtered by the persona_nro_doc column
 * @method     Socio findOneByFechaAlta(string $fecha_alta) Return the first Socio filtered by the fecha_alta column
 * @method     Socio findOneByVitalicio(boolean $vitalicio) Return the first Socio filtered by the vitalicio column
 * @method     Socio findOneByActivo(boolean $activo) Return the first Socio filtered by the activo column
 *
 * @method     array findByPersonaNroDoc(int $persona_nro_doc) Return Socio objects filtered by the persona_nro_doc column
 * @method     array findByFechaAlta(string $fecha_alta) Return Socio objects filtered by the fecha_alta column
 * @method     array findByVitalicio(boolean $vitalicio) Return Socio objects filtered by the vitalicio column
 * @method     array findByActivo(boolean $activo) Return Socio objects filtered by the activo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSocioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSocioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Socio', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SocioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SocioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SocioQuery) {
			return $criteria;
		}
		$query = new SocioQuery();
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
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Socio|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SocioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SocioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Socio A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `PERSONA_NRO_DOC`, `FECHA_ALTA`, `VITALICIO`, `ACTIVO` FROM `socio` WHERE `PERSONA_NRO_DOC` = :p0';
		try {
			$stmt = $con->prepare($sql);			
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Socio();
			$obj->hydrate($row);
			SocioPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Socio|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(12, 56, 832), $con);
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
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SocioPeer::PERSONA_NRO_DOC, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SocioPeer::PERSONA_NRO_DOC, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the persona_nro_doc column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPersonaNroDoc(1234); // WHERE persona_nro_doc = 1234
	 * $query->filterByPersonaNroDoc(array(12, 34)); // WHERE persona_nro_doc IN (12, 34)
	 * $query->filterByPersonaNroDoc(array('min' => 12)); // WHERE persona_nro_doc > 12
	 * </code>
	 *
	 * @see       filterByPersona()
	 *
	 * @param     mixed $personaNroDoc The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByPersonaNroDoc($personaNroDoc = null, $comparison = null)
	{
		if (is_array($personaNroDoc) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SocioPeer::PERSONA_NRO_DOC, $personaNroDoc, $comparison);
	}

	/**
	 * Filter the query on the fecha_alta column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechaAlta('2011-03-14'); // WHERE fecha_alta = '2011-03-14'
	 * $query->filterByFechaAlta('now'); // WHERE fecha_alta = '2011-03-14'
	 * $query->filterByFechaAlta(array('max' => 'yesterday')); // WHERE fecha_alta > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechaAlta The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByFechaAlta($fechaAlta = null, $comparison = null)
	{
		if (is_array($fechaAlta)) {
			$useMinMax = false;
			if (isset($fechaAlta['min'])) {
				$this->addUsingAlias(SocioPeer::FECHA_ALTA, $fechaAlta['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaAlta['max'])) {
				$this->addUsingAlias(SocioPeer::FECHA_ALTA, $fechaAlta['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SocioPeer::FECHA_ALTA, $fechaAlta, $comparison);
	}

	/**
	 * Filter the query on the vitalicio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVitalicio(true); // WHERE vitalicio = true
	 * $query->filterByVitalicio('yes'); // WHERE vitalicio = true
	 * </code>
	 *
	 * @param     boolean|string $vitalicio The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByVitalicio($vitalicio = null, $comparison = null)
	{
		if (is_string($vitalicio)) {
			$vitalicio = in_array(strtolower($vitalicio), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SocioPeer::VITALICIO, $vitalicio, $comparison);
	}

	/**
	 * Filter the query on the activo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActivo(true); // WHERE activo = true
	 * $query->filterByActivo('yes'); // WHERE activo = true
	 * </code>
	 *
	 * @param     boolean|string $activo The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByActivo($activo = null, $comparison = null)
	{
		if (is_string($activo)) {
			$activo = in_array(strtolower($activo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SocioPeer::ACTIVO, $activo, $comparison);
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona|PropelCollection $persona The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		if ($persona instanceof Persona) {
			return $this
				->addUsingAlias(SocioPeer::PERSONA_NRO_DOC, $persona->getNroDoc(), $comparison);
		} elseif ($persona instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SocioPeer::PERSONA_NRO_DOC, $persona->toKeyValue('PrimaryKey', 'NroDoc'), $comparison);
		} else {
			throw new PropelException('filterByPersona() only accepts arguments of type Persona or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Persona relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function joinPersona($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Persona');

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
			$this->addJoinObject($join, 'Persona');
		}

		return $this;
	}

	/**
	 * Use the Persona relation Persona object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaQuery A secondary query class using the current class as primary query
	 */
	public function usePersonaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPersona($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Persona', 'PersonaQuery');
	}

	/**
	 * Filter the query by a related Reserva object
	 *
	 * @param     Reserva $reserva  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByReserva($reserva, $comparison = null)
	{
		if ($reserva instanceof Reserva) {
			return $this
				->addUsingAlias(SocioPeer::PERSONA_NRO_DOC, $reserva->getSocioNroDoc(), $comparison);
		} elseif ($reserva instanceof PropelCollection) {
			return $this
				->useReservaQuery()
				->filterByPrimaryKeys($reserva->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByReserva() only accepts arguments of type Reserva or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Reserva relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function joinReserva($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Reserva');

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
			$this->addJoinObject($join, 'Reserva');
		}

		return $this;
	}

	/**
	 * Use the Reserva relation Reserva object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ReservaQuery A secondary query class using the current class as primary query
	 */
	public function useReservaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinReserva($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Reserva', 'ReservaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Socio $socio Object to remove from the list of results
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function prune($socio = null)
	{
		if ($socio) {
			$this->addUsingAlias(SocioPeer::PERSONA_NRO_DOC, $socio->getPersonaNroDoc(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSocioQuery