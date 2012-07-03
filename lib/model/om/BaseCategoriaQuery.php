<?php


/**
 * Base class that represents a query for the 'categoria' table.
 *
 * 
 *
 * @method     CategoriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CategoriaQuery orderByDescripcionCategoria($order = Criteria::ASC) Order by the descripcion_categoria column
 * @method     CategoriaQuery orderByEdadMin($order = Criteria::ASC) Order by the edad_min column
 * @method     CategoriaQuery orderByEdadMax($order = Criteria::ASC) Order by the edad_max column
 *
 * @method     CategoriaQuery groupById() Group by the id column
 * @method     CategoriaQuery groupByDescripcionCategoria() Group by the descripcion_categoria column
 * @method     CategoriaQuery groupByEdadMin() Group by the edad_min column
 * @method     CategoriaQuery groupByEdadMax() Group by the edad_max column
 *
 * @method     CategoriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CategoriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CategoriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CategoriaQuery leftJoinRanking($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ranking relation
 * @method     CategoriaQuery rightJoinRanking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ranking relation
 * @method     CategoriaQuery innerJoinRanking($relationAlias = null) Adds a INNER JOIN clause to the query using the Ranking relation
 *
 * @method     CategoriaQuery leftJoinTorneoCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the TorneoCategoria relation
 * @method     CategoriaQuery rightJoinTorneoCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TorneoCategoria relation
 * @method     CategoriaQuery innerJoinTorneoCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the TorneoCategoria relation
 *
 * @method     Categoria findOne(PropelPDO $con = null) Return the first Categoria matching the query
 * @method     Categoria findOneOrCreate(PropelPDO $con = null) Return the first Categoria matching the query, or a new Categoria object populated from the query conditions when no match is found
 *
 * @method     Categoria findOneById(int $id) Return the first Categoria filtered by the id column
 * @method     Categoria findOneByDescripcionCategoria(string $descripcion_categoria) Return the first Categoria filtered by the descripcion_categoria column
 * @method     Categoria findOneByEdadMin(int $edad_min) Return the first Categoria filtered by the edad_min column
 * @method     Categoria findOneByEdadMax(int $edad_max) Return the first Categoria filtered by the edad_max column
 *
 * @method     array findById(int $id) Return Categoria objects filtered by the id column
 * @method     array findByDescripcionCategoria(string $descripcion_categoria) Return Categoria objects filtered by the descripcion_categoria column
 * @method     array findByEdadMin(int $edad_min) Return Categoria objects filtered by the edad_min column
 * @method     array findByEdadMax(int $edad_max) Return Categoria objects filtered by the edad_max column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCategoriaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCategoriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Categoria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CategoriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CategoriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CategoriaQuery) {
			return $criteria;
		}
		$query = new CategoriaQuery();
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
	 * @return    Categoria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CategoriaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Categoria A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DESCRIPCION_CATEGORIA`, `EDAD_MIN`, `EDAD_MAX` FROM `categoria` WHERE `ID` = :p0';
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
			$obj = new Categoria();
			$obj->hydrate($row);
			CategoriaPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Categoria|array|mixed the result, formatted by the current formatter
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
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CategoriaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CategoriaPeer::ID, $keys, Criteria::IN);
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
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CategoriaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the descripcion_categoria column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescripcionCategoria('fooValue');   // WHERE descripcion_categoria = 'fooValue'
	 * $query->filterByDescripcionCategoria('%fooValue%'); // WHERE descripcion_categoria LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descripcionCategoria The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByDescripcionCategoria($descripcionCategoria = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descripcionCategoria)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descripcionCategoria)) {
				$descripcionCategoria = str_replace('*', '%', $descripcionCategoria);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CategoriaPeer::DESCRIPCION_CATEGORIA, $descripcionCategoria, $comparison);
	}

	/**
	 * Filter the query on the edad_min column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEdadMin(1234); // WHERE edad_min = 1234
	 * $query->filterByEdadMin(array(12, 34)); // WHERE edad_min IN (12, 34)
	 * $query->filterByEdadMin(array('min' => 12)); // WHERE edad_min > 12
	 * </code>
	 *
	 * @param     mixed $edadMin The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByEdadMin($edadMin = null, $comparison = null)
	{
		if (is_array($edadMin)) {
			$useMinMax = false;
			if (isset($edadMin['min'])) {
				$this->addUsingAlias(CategoriaPeer::EDAD_MIN, $edadMin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($edadMin['max'])) {
				$this->addUsingAlias(CategoriaPeer::EDAD_MIN, $edadMin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CategoriaPeer::EDAD_MIN, $edadMin, $comparison);
	}

	/**
	 * Filter the query on the edad_max column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEdadMax(1234); // WHERE edad_max = 1234
	 * $query->filterByEdadMax(array(12, 34)); // WHERE edad_max IN (12, 34)
	 * $query->filterByEdadMax(array('min' => 12)); // WHERE edad_max > 12
	 * </code>
	 *
	 * @param     mixed $edadMax The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByEdadMax($edadMax = null, $comparison = null)
	{
		if (is_array($edadMax)) {
			$useMinMax = false;
			if (isset($edadMax['min'])) {
				$this->addUsingAlias(CategoriaPeer::EDAD_MAX, $edadMax['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($edadMax['max'])) {
				$this->addUsingAlias(CategoriaPeer::EDAD_MAX, $edadMax['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CategoriaPeer::EDAD_MAX, $edadMax, $comparison);
	}

	/**
	 * Filter the query by a related Ranking object
	 *
	 * @param     Ranking $ranking  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByRanking($ranking, $comparison = null)
	{
		if ($ranking instanceof Ranking) {
			return $this
				->addUsingAlias(CategoriaPeer::ID, $ranking->getCategoriaId(), $comparison);
		} elseif ($ranking instanceof PropelCollection) {
			return $this
				->useRankingQuery()
				->filterByPrimaryKeys($ranking->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByRanking() only accepts arguments of type Ranking or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Ranking relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function joinRanking($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Ranking');

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
			$this->addJoinObject($join, 'Ranking');
		}

		return $this;
	}

	/**
	 * Use the Ranking relation Ranking object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RankingQuery A secondary query class using the current class as primary query
	 */
	public function useRankingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRanking($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Ranking', 'RankingQuery');
	}

	/**
	 * Filter the query by a related TorneoCategoria object
	 *
	 * @param     TorneoCategoria $torneoCategoria  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByTorneoCategoria($torneoCategoria, $comparison = null)
	{
		if ($torneoCategoria instanceof TorneoCategoria) {
			return $this
				->addUsingAlias(CategoriaPeer::ID, $torneoCategoria->getCategoriaId(), $comparison);
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
	 * @return    CategoriaQuery The current query, for fluid interface
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
	 * @param     Categoria $categoria Object to remove from the list of results
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function prune($categoria = null)
	{
		if ($categoria) {
			$this->addUsingAlias(CategoriaPeer::ID, $categoria->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCategoriaQuery