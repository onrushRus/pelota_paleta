<?php


/**
 * Base class that represents a query for the 'puntos_puesto' table.
 *
 * 
 *
 * @method     PuntosPuestoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PuntosPuestoQuery orderByPuntosPorPuesto($order = Criteria::ASC) Order by the puntos_por_puesto column
 *
 * @method     PuntosPuestoQuery groupById() Group by the id column
 * @method     PuntosPuestoQuery groupByPuntosPorPuesto() Group by the puntos_por_puesto column
 *
 * @method     PuntosPuestoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PuntosPuestoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PuntosPuestoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PuntosPuestoQuery leftJoinResultadoTorneo($relationAlias = null) Adds a LEFT JOIN clause to the query using the ResultadoTorneo relation
 * @method     PuntosPuestoQuery rightJoinResultadoTorneo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ResultadoTorneo relation
 * @method     PuntosPuestoQuery innerJoinResultadoTorneo($relationAlias = null) Adds a INNER JOIN clause to the query using the ResultadoTorneo relation
 *
 * @method     PuntosPuesto findOne(PropelPDO $con = null) Return the first PuntosPuesto matching the query
 * @method     PuntosPuesto findOneOrCreate(PropelPDO $con = null) Return the first PuntosPuesto matching the query, or a new PuntosPuesto object populated from the query conditions when no match is found
 *
 * @method     PuntosPuesto findOneById(int $id) Return the first PuntosPuesto filtered by the id column
 * @method     PuntosPuesto findOneByPuntosPorPuesto(int $puntos_por_puesto) Return the first PuntosPuesto filtered by the puntos_por_puesto column
 *
 * @method     array findById(int $id) Return PuntosPuesto objects filtered by the id column
 * @method     array findByPuntosPorPuesto(int $puntos_por_puesto) Return PuntosPuesto objects filtered by the puntos_por_puesto column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePuntosPuestoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePuntosPuestoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PuntosPuesto', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PuntosPuestoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PuntosPuestoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PuntosPuestoQuery) {
			return $criteria;
		}
		$query = new PuntosPuestoQuery();
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
	 * @return    PuntosPuesto|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PuntosPuestoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PuntosPuestoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    PuntosPuesto A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PUNTOS_POR_PUESTO` FROM `puntos_puesto` WHERE `ID` = :p0';
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
			$obj = new PuntosPuesto();
			$obj->hydrate($row);
			PuntosPuestoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    PuntosPuesto|array|mixed the result, formatted by the current formatter
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
	 * @return    PuntosPuestoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PuntosPuestoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PuntosPuestoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PuntosPuestoPeer::ID, $keys, Criteria::IN);
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
	 * @return    PuntosPuestoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PuntosPuestoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the puntos_por_puesto column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPuntosPorPuesto(1234); // WHERE puntos_por_puesto = 1234
	 * $query->filterByPuntosPorPuesto(array(12, 34)); // WHERE puntos_por_puesto IN (12, 34)
	 * $query->filterByPuntosPorPuesto(array('min' => 12)); // WHERE puntos_por_puesto > 12
	 * </code>
	 *
	 * @param     mixed $puntosPorPuesto The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PuntosPuestoQuery The current query, for fluid interface
	 */
	public function filterByPuntosPorPuesto($puntosPorPuesto = null, $comparison = null)
	{
		if (is_array($puntosPorPuesto)) {
			$useMinMax = false;
			if (isset($puntosPorPuesto['min'])) {
				$this->addUsingAlias(PuntosPuestoPeer::PUNTOS_POR_PUESTO, $puntosPorPuesto['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($puntosPorPuesto['max'])) {
				$this->addUsingAlias(PuntosPuestoPeer::PUNTOS_POR_PUESTO, $puntosPorPuesto['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PuntosPuestoPeer::PUNTOS_POR_PUESTO, $puntosPorPuesto, $comparison);
	}

	/**
	 * Filter the query by a related ResultadoTorneo object
	 *
	 * @param     ResultadoTorneo $resultadoTorneo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PuntosPuestoQuery The current query, for fluid interface
	 */
	public function filterByResultadoTorneo($resultadoTorneo, $comparison = null)
	{
		if ($resultadoTorneo instanceof ResultadoTorneo) {
			return $this
				->addUsingAlias(PuntosPuestoPeer::ID, $resultadoTorneo->getPuestoId(), $comparison);
		} elseif ($resultadoTorneo instanceof PropelCollection) {
			return $this
				->useResultadoTorneoQuery()
				->filterByPrimaryKeys($resultadoTorneo->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByResultadoTorneo() only accepts arguments of type ResultadoTorneo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ResultadoTorneo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PuntosPuestoQuery The current query, for fluid interface
	 */
	public function joinResultadoTorneo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ResultadoTorneo');

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
			$this->addJoinObject($join, 'ResultadoTorneo');
		}

		return $this;
	}

	/**
	 * Use the ResultadoTorneo relation ResultadoTorneo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ResultadoTorneoQuery A secondary query class using the current class as primary query
	 */
	public function useResultadoTorneoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinResultadoTorneo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ResultadoTorneo', 'ResultadoTorneoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PuntosPuesto $puntosPuesto Object to remove from the list of results
	 *
	 * @return    PuntosPuestoQuery The current query, for fluid interface
	 */
	public function prune($puntosPuesto = null)
	{
		if ($puntosPuesto) {
			$this->addUsingAlias(PuntosPuestoPeer::ID, $puntosPuesto->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePuntosPuestoQuery