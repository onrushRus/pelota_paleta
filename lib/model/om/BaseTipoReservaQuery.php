<?php


/**
 * Base class that represents a query for the 'tipo_reserva' table.
 *
 * 
 *
 * @method     TipoReservaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TipoReservaQuery orderByDescirpcionReserva($order = Criteria::ASC) Order by the descirpcion_reserva column
 * @method     TipoReservaQuery orderByTiempoReserva($order = Criteria::ASC) Order by the tiempo_reserva column
 *
 * @method     TipoReservaQuery groupById() Group by the id column
 * @method     TipoReservaQuery groupByDescirpcionReserva() Group by the descirpcion_reserva column
 * @method     TipoReservaQuery groupByTiempoReserva() Group by the tiempo_reserva column
 *
 * @method     TipoReservaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TipoReservaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TipoReservaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TipoReservaQuery leftJoinReserva($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reserva relation
 * @method     TipoReservaQuery rightJoinReserva($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reserva relation
 * @method     TipoReservaQuery innerJoinReserva($relationAlias = null) Adds a INNER JOIN clause to the query using the Reserva relation
 *
 * @method     TipoReserva findOne(PropelPDO $con = null) Return the first TipoReserva matching the query
 * @method     TipoReserva findOneOrCreate(PropelPDO $con = null) Return the first TipoReserva matching the query, or a new TipoReserva object populated from the query conditions when no match is found
 *
 * @method     TipoReserva findOneById(int $id) Return the first TipoReserva filtered by the id column
 * @method     TipoReserva findOneByDescirpcionReserva(string $descirpcion_reserva) Return the first TipoReserva filtered by the descirpcion_reserva column
 * @method     TipoReserva findOneByTiempoReserva(string $tiempo_reserva) Return the first TipoReserva filtered by the tiempo_reserva column
 *
 * @method     array findById(int $id) Return TipoReserva objects filtered by the id column
 * @method     array findByDescirpcionReserva(string $descirpcion_reserva) Return TipoReserva objects filtered by the descirpcion_reserva column
 * @method     array findByTiempoReserva(string $tiempo_reserva) Return TipoReserva objects filtered by the tiempo_reserva column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTipoReservaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTipoReservaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TipoReserva', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TipoReservaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TipoReservaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TipoReservaQuery) {
			return $criteria;
		}
		$query = new TipoReservaQuery();
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
	 * @return    TipoReserva|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TipoReservaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TipoReservaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    TipoReserva A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DESCIRPCION_RESERVA`, `TIEMPO_RESERVA` FROM `tipo_reserva` WHERE `ID` = :p0';
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
			$obj = new TipoReserva();
			$obj->hydrate($row);
			TipoReservaPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    TipoReserva|array|mixed the result, formatted by the current formatter
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
	 * @return    TipoReservaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TipoReservaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TipoReservaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TipoReservaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoReservaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TipoReservaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the descirpcion_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescirpcionReserva('fooValue');   // WHERE descirpcion_reserva = 'fooValue'
	 * $query->filterByDescirpcionReserva('%fooValue%'); // WHERE descirpcion_reserva LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descirpcionReserva The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoReservaQuery The current query, for fluid interface
	 */
	public function filterByDescirpcionReserva($descirpcionReserva = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descirpcionReserva)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descirpcionReserva)) {
				$descirpcionReserva = str_replace('*', '%', $descirpcionReserva);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TipoReservaPeer::DESCIRPCION_RESERVA, $descirpcionReserva, $comparison);
	}

	/**
	 * Filter the query on the tiempo_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTiempoReserva(1234); // WHERE tiempo_reserva = 1234
	 * $query->filterByTiempoReserva(array(12, 34)); // WHERE tiempo_reserva IN (12, 34)
	 * $query->filterByTiempoReserva(array('min' => 12)); // WHERE tiempo_reserva > 12
	 * </code>
	 *
	 * @param     mixed $tiempoReserva The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoReservaQuery The current query, for fluid interface
	 */
	public function filterByTiempoReserva($tiempoReserva = null, $comparison = null)
	{
		if (is_array($tiempoReserva)) {
			$useMinMax = false;
			if (isset($tiempoReserva['min'])) {
				$this->addUsingAlias(TipoReservaPeer::TIEMPO_RESERVA, $tiempoReserva['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tiempoReserva['max'])) {
				$this->addUsingAlias(TipoReservaPeer::TIEMPO_RESERVA, $tiempoReserva['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TipoReservaPeer::TIEMPO_RESERVA, $tiempoReserva, $comparison);
	}

	/**
	 * Filter the query by a related Reserva object
	 *
	 * @param     Reserva $reserva  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoReservaQuery The current query, for fluid interface
	 */
	public function filterByReserva($reserva, $comparison = null)
	{
		if ($reserva instanceof Reserva) {
			return $this
				->addUsingAlias(TipoReservaPeer::ID, $reserva->getTipoReservaId(), $comparison);
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
	 * @return    TipoReservaQuery The current query, for fluid interface
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
	 * @param     TipoReserva $tipoReserva Object to remove from the list of results
	 *
	 * @return    TipoReservaQuery The current query, for fluid interface
	 */
	public function prune($tipoReserva = null)
	{
		if ($tipoReserva) {
			$this->addUsingAlias(TipoReservaPeer::ID, $tipoReserva->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTipoReservaQuery