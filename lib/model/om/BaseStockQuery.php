<?php


/**
 * Base class that represents a query for the 'stock' table.
 *
 * 
 *
 * @method     StockQuery orderByProductoId($order = Criteria::ASC) Order by the producto_id column
 * @method     StockQuery orderByCantidadActual($order = Criteria::ASC) Order by the cantidad_actual column
 * @method     StockQuery orderByCantidadMinima($order = Criteria::ASC) Order by the cantidad_minima column
 *
 * @method     StockQuery groupByProductoId() Group by the producto_id column
 * @method     StockQuery groupByCantidadActual() Group by the cantidad_actual column
 * @method     StockQuery groupByCantidadMinima() Group by the cantidad_minima column
 *
 * @method     StockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     StockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     StockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     StockQuery leftJoinProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Producto relation
 * @method     StockQuery rightJoinProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Producto relation
 * @method     StockQuery innerJoinProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the Producto relation
 *
 * @method     Stock findOne(PropelPDO $con = null) Return the first Stock matching the query
 * @method     Stock findOneOrCreate(PropelPDO $con = null) Return the first Stock matching the query, or a new Stock object populated from the query conditions when no match is found
 *
 * @method     Stock findOneByProductoId(int $producto_id) Return the first Stock filtered by the producto_id column
 * @method     Stock findOneByCantidadActual(int $cantidad_actual) Return the first Stock filtered by the cantidad_actual column
 * @method     Stock findOneByCantidadMinima(int $cantidad_minima) Return the first Stock filtered by the cantidad_minima column
 *
 * @method     array findByProductoId(int $producto_id) Return Stock objects filtered by the producto_id column
 * @method     array findByCantidadActual(int $cantidad_actual) Return Stock objects filtered by the cantidad_actual column
 * @method     array findByCantidadMinima(int $cantidad_minima) Return Stock objects filtered by the cantidad_minima column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseStockQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseStockQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Stock', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new StockQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    StockQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof StockQuery) {
			return $criteria;
		}
		$query = new StockQuery();
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
	 * @return    Stock|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = StockPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(StockPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Stock A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `PRODUCTO_ID`, `CANTIDAD_ACTUAL`, `CANTIDAD_MINIMA` FROM `stock` WHERE `PRODUCTO_ID` = :p0';
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
			$obj = new Stock();
			$obj->hydrate($row);
			StockPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Stock|array|mixed the result, formatted by the current formatter
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
	 * @return    StockQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(StockPeer::PRODUCTO_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    StockQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(StockPeer::PRODUCTO_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the producto_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProductoId(1234); // WHERE producto_id = 1234
	 * $query->filterByProductoId(array(12, 34)); // WHERE producto_id IN (12, 34)
	 * $query->filterByProductoId(array('min' => 12)); // WHERE producto_id > 12
	 * </code>
	 *
	 * @see       filterByProducto()
	 *
	 * @param     mixed $productoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StockQuery The current query, for fluid interface
	 */
	public function filterByProductoId($productoId = null, $comparison = null)
	{
		if (is_array($productoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(StockPeer::PRODUCTO_ID, $productoId, $comparison);
	}

	/**
	 * Filter the query on the cantidad_actual column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCantidadActual(1234); // WHERE cantidad_actual = 1234
	 * $query->filterByCantidadActual(array(12, 34)); // WHERE cantidad_actual IN (12, 34)
	 * $query->filterByCantidadActual(array('min' => 12)); // WHERE cantidad_actual > 12
	 * </code>
	 *
	 * @param     mixed $cantidadActual The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StockQuery The current query, for fluid interface
	 */
	public function filterByCantidadActual($cantidadActual = null, $comparison = null)
	{
		if (is_array($cantidadActual)) {
			$useMinMax = false;
			if (isset($cantidadActual['min'])) {
				$this->addUsingAlias(StockPeer::CANTIDAD_ACTUAL, $cantidadActual['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cantidadActual['max'])) {
				$this->addUsingAlias(StockPeer::CANTIDAD_ACTUAL, $cantidadActual['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StockPeer::CANTIDAD_ACTUAL, $cantidadActual, $comparison);
	}

	/**
	 * Filter the query on the cantidad_minima column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCantidadMinima(1234); // WHERE cantidad_minima = 1234
	 * $query->filterByCantidadMinima(array(12, 34)); // WHERE cantidad_minima IN (12, 34)
	 * $query->filterByCantidadMinima(array('min' => 12)); // WHERE cantidad_minima > 12
	 * </code>
	 *
	 * @param     mixed $cantidadMinima The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StockQuery The current query, for fluid interface
	 */
	public function filterByCantidadMinima($cantidadMinima = null, $comparison = null)
	{
		if (is_array($cantidadMinima)) {
			$useMinMax = false;
			if (isset($cantidadMinima['min'])) {
				$this->addUsingAlias(StockPeer::CANTIDAD_MINIMA, $cantidadMinima['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cantidadMinima['max'])) {
				$this->addUsingAlias(StockPeer::CANTIDAD_MINIMA, $cantidadMinima['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StockPeer::CANTIDAD_MINIMA, $cantidadMinima, $comparison);
	}

	/**
	 * Filter the query by a related Producto object
	 *
	 * @param     Producto|PropelCollection $producto The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StockQuery The current query, for fluid interface
	 */
	public function filterByProducto($producto, $comparison = null)
	{
		if ($producto instanceof Producto) {
			return $this
				->addUsingAlias(StockPeer::PRODUCTO_ID, $producto->getId(), $comparison);
		} elseif ($producto instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(StockPeer::PRODUCTO_ID, $producto->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByProducto() only accepts arguments of type Producto or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Producto relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StockQuery The current query, for fluid interface
	 */
	public function joinProducto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Producto');

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
			$this->addJoinObject($join, 'Producto');
		}

		return $this;
	}

	/**
	 * Use the Producto relation Producto object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductoQuery A secondary query class using the current class as primary query
	 */
	public function useProductoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProducto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Producto', 'ProductoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Stock $stock Object to remove from the list of results
	 *
	 * @return    StockQuery The current query, for fluid interface
	 */
	public function prune($stock = null)
	{
		if ($stock) {
			$this->addUsingAlias(StockPeer::PRODUCTO_ID, $stock->getProductoId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseStockQuery