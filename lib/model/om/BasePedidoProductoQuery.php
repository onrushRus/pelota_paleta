<?php


/**
 * Base class that represents a query for the 'pedido_producto' table.
 *
 * 
 *
 * @method     PedidoProductoQuery orderByPedidoId($order = Criteria::ASC) Order by the pedido_id column
 * @method     PedidoProductoQuery orderByProductoId($order = Criteria::ASC) Order by the producto_id column
 *
 * @method     PedidoProductoQuery groupByPedidoId() Group by the pedido_id column
 * @method     PedidoProductoQuery groupByProductoId() Group by the producto_id column
 *
 * @method     PedidoProductoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PedidoProductoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PedidoProductoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PedidoProductoQuery leftJoinPedido($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pedido relation
 * @method     PedidoProductoQuery rightJoinPedido($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pedido relation
 * @method     PedidoProductoQuery innerJoinPedido($relationAlias = null) Adds a INNER JOIN clause to the query using the Pedido relation
 *
 * @method     PedidoProductoQuery leftJoinProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Producto relation
 * @method     PedidoProductoQuery rightJoinProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Producto relation
 * @method     PedidoProductoQuery innerJoinProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the Producto relation
 *
 * @method     PedidoProducto findOne(PropelPDO $con = null) Return the first PedidoProducto matching the query
 * @method     PedidoProducto findOneOrCreate(PropelPDO $con = null) Return the first PedidoProducto matching the query, or a new PedidoProducto object populated from the query conditions when no match is found
 *
 * @method     PedidoProducto findOneByPedidoId(int $pedido_id) Return the first PedidoProducto filtered by the pedido_id column
 * @method     PedidoProducto findOneByProductoId(int $producto_id) Return the first PedidoProducto filtered by the producto_id column
 *
 * @method     array findByPedidoId(int $pedido_id) Return PedidoProducto objects filtered by the pedido_id column
 * @method     array findByProductoId(int $producto_id) Return PedidoProducto objects filtered by the producto_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePedidoProductoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePedidoProductoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PedidoProducto', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PedidoProductoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PedidoProductoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PedidoProductoQuery) {
			return $criteria;
		}
		$query = new PedidoProductoQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$pedido_id, $producto_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PedidoProducto|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PedidoProductoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PedidoProductoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    PedidoProducto A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `PEDIDO_ID`, `PRODUCTO_ID` FROM `pedido_producto` WHERE `PEDIDO_ID` = :p0 AND `PRODUCTO_ID` = :p1';
		try {
			$stmt = $con->prepare($sql);			
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new PedidoProducto();
			$obj->hydrate($row);
			PedidoProductoPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    PedidoProducto|array|mixed the result, formatted by the current formatter
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
	 * @return    PedidoProductoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(PedidoProductoPeer::PEDIDO_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(PedidoProductoPeer::PRODUCTO_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PedidoProductoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(PedidoProductoPeer::PEDIDO_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(PedidoProductoPeer::PRODUCTO_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the pedido_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPedidoId(1234); // WHERE pedido_id = 1234
	 * $query->filterByPedidoId(array(12, 34)); // WHERE pedido_id IN (12, 34)
	 * $query->filterByPedidoId(array('min' => 12)); // WHERE pedido_id > 12
	 * </code>
	 *
	 * @see       filterByPedido()
	 *
	 * @param     mixed $pedidoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoProductoQuery The current query, for fluid interface
	 */
	public function filterByPedidoId($pedidoId = null, $comparison = null)
	{
		if (is_array($pedidoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PedidoProductoPeer::PEDIDO_ID, $pedidoId, $comparison);
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
	 * @return    PedidoProductoQuery The current query, for fluid interface
	 */
	public function filterByProductoId($productoId = null, $comparison = null)
	{
		if (is_array($productoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PedidoProductoPeer::PRODUCTO_ID, $productoId, $comparison);
	}

	/**
	 * Filter the query by a related Pedido object
	 *
	 * @param     Pedido|PropelCollection $pedido The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoProductoQuery The current query, for fluid interface
	 */
	public function filterByPedido($pedido, $comparison = null)
	{
		if ($pedido instanceof Pedido) {
			return $this
				->addUsingAlias(PedidoProductoPeer::PEDIDO_ID, $pedido->getId(), $comparison);
		} elseif ($pedido instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PedidoProductoPeer::PEDIDO_ID, $pedido->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPedido() only accepts arguments of type Pedido or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Pedido relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PedidoProductoQuery The current query, for fluid interface
	 */
	public function joinPedido($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pedido');

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
			$this->addJoinObject($join, 'Pedido');
		}

		return $this;
	}

	/**
	 * Use the Pedido relation Pedido object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PedidoQuery A secondary query class using the current class as primary query
	 */
	public function usePedidoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPedido($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pedido', 'PedidoQuery');
	}

	/**
	 * Filter the query by a related Producto object
	 *
	 * @param     Producto|PropelCollection $producto The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoProductoQuery The current query, for fluid interface
	 */
	public function filterByProducto($producto, $comparison = null)
	{
		if ($producto instanceof Producto) {
			return $this
				->addUsingAlias(PedidoProductoPeer::PRODUCTO_ID, $producto->getId(), $comparison);
		} elseif ($producto instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PedidoProductoPeer::PRODUCTO_ID, $producto->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PedidoProductoQuery The current query, for fluid interface
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
	 * @param     PedidoProducto $pedidoProducto Object to remove from the list of results
	 *
	 * @return    PedidoProductoQuery The current query, for fluid interface
	 */
	public function prune($pedidoProducto = null)
	{
		if ($pedidoProducto) {
			$this->addCond('pruneCond0', $this->getAliasedColName(PedidoProductoPeer::PEDIDO_ID), $pedidoProducto->getPedidoId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(PedidoProductoPeer::PRODUCTO_ID), $pedidoProducto->getProductoId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BasePedidoProductoQuery