<?php


/**
 * Base class that represents a query for the 'torneo' table.
 *
 * 
 *
 * @method     TorneoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TorneoQuery orderByAnio($order = Criteria::ASC) Order by the anio column
 * @method     TorneoQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     TorneoQuery orderByTipoTorneo($order = Criteria::ASC) Order by the tipo_torneo column
 *
 * @method     TorneoQuery groupById() Group by the id column
 * @method     TorneoQuery groupByAnio() Group by the anio column
 * @method     TorneoQuery groupByNombre() Group by the nombre column
 * @method     TorneoQuery groupByTipoTorneo() Group by the tipo_torneo column
 *
 * @method     TorneoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TorneoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TorneoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TorneoQuery leftJoinTorneoCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the TorneoCategoria relation
 * @method     TorneoQuery rightJoinTorneoCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TorneoCategoria relation
 * @method     TorneoQuery innerJoinTorneoCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the TorneoCategoria relation
 *
 * @method     Torneo findOne(PropelPDO $con = null) Return the first Torneo matching the query
 * @method     Torneo findOneOrCreate(PropelPDO $con = null) Return the first Torneo matching the query, or a new Torneo object populated from the query conditions when no match is found
 *
 * @method     Torneo findOneById(int $id) Return the first Torneo filtered by the id column
 * @method     Torneo findOneByAnio(int $anio) Return the first Torneo filtered by the anio column
 * @method     Torneo findOneByNombre(string $nombre) Return the first Torneo filtered by the nombre column
 * @method     Torneo findOneByTipoTorneo(boolean $tipo_torneo) Return the first Torneo filtered by the tipo_torneo column
 *
 * @method     array findById(int $id) Return Torneo objects filtered by the id column
 * @method     array findByAnio(int $anio) Return Torneo objects filtered by the anio column
 * @method     array findByNombre(string $nombre) Return Torneo objects filtered by the nombre column
 * @method     array findByTipoTorneo(boolean $tipo_torneo) Return Torneo objects filtered by the tipo_torneo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTorneoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTorneoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Torneo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TorneoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TorneoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TorneoQuery) {
			return $criteria;
		}
		$query = new TorneoQuery();
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
	 * @return    Torneo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TorneoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TorneoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Torneo A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ANIO`, `NOMBRE`, `TIPO_TORNEO` FROM `torneo` WHERE `ID` = :p0';
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
			$obj = new Torneo();
			$obj->hydrate($row);
			TorneoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Torneo|array|mixed the result, formatted by the current formatter
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
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TorneoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TorneoPeer::ID, $keys, Criteria::IN);
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
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TorneoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the anio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAnio(1234); // WHERE anio = 1234
	 * $query->filterByAnio(array(12, 34)); // WHERE anio IN (12, 34)
	 * $query->filterByAnio(array('min' => 12)); // WHERE anio > 12
	 * </code>
	 *
	 * @param     mixed $anio The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByAnio($anio = null, $comparison = null)
	{
		if (is_array($anio)) {
			$useMinMax = false;
			if (isset($anio['min'])) {
				$this->addUsingAlias(TorneoPeer::ANIO, $anio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($anio['max'])) {
				$this->addUsingAlias(TorneoPeer::ANIO, $anio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TorneoPeer::ANIO, $anio, $comparison);
	}

	/**
	 * Filter the query on the nombre column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
	 * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nombre The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByNombre($nombre = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombre)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombre)) {
				$nombre = str_replace('*', '%', $nombre);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TorneoPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the tipo_torneo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoTorneo(true); // WHERE tipo_torneo = true
	 * $query->filterByTipoTorneo('yes'); // WHERE tipo_torneo = true
	 * </code>
	 *
	 * @param     boolean|string $tipoTorneo The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByTipoTorneo($tipoTorneo = null, $comparison = null)
	{
		if (is_string($tipoTorneo)) {
			$tipo_torneo = in_array(strtolower($tipoTorneo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(TorneoPeer::TIPO_TORNEO, $tipoTorneo, $comparison);
	}

	/**
	 * Filter the query by a related TorneoCategoria object
	 *
	 * @param     TorneoCategoria $torneoCategoria  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByTorneoCategoria($torneoCategoria, $comparison = null)
	{
		if ($torneoCategoria instanceof TorneoCategoria) {
			return $this
				->addUsingAlias(TorneoPeer::ID, $torneoCategoria->getTorneoId(), $comparison);
		} elseif ($torneoCategoria instanceof PropelCollection) {
			return $this
				->useTorneoCategoriaQuery()
				->filterByPrimaryKeys($torneoCategoria->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByTorneoCategoria() only accepts arguments of type TorneoCategoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TorneoCategoria relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function joinTorneoCategoria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TorneoCategoria');

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
			$this->addJoinObject($join, 'TorneoCategoria');
		}

		return $this;
	}

	/**
	 * Use the TorneoCategoria relation TorneoCategoria object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TorneoCategoriaQuery A secondary query class using the current class as primary query
	 */
	public function useTorneoCategoriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTorneoCategoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TorneoCategoria', 'TorneoCategoriaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Torneo $torneo Object to remove from the list of results
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function prune($torneo = null)
	{
		if ($torneo) {
			$this->addUsingAlias(TorneoPeer::ID, $torneo->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTorneoQuery