<?php


/**
 * Base class that represents a query for the 'pedido' table.
 *
 * 
 *
 * @method     PedidoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PedidoQuery orderByProveedorId($order = Criteria::ASC) Order by the proveedor_id column
 * @method     PedidoQuery orderByFechaPedido($order = Criteria::ASC) Order by the fecha_pedido column
 *
 * @method     PedidoQuery groupById() Group by the id column
 * @method     PedidoQuery groupByProveedorId() Group by the proveedor_id column
 * @method     PedidoQuery groupByFechaPedido() Group by the fecha_pedido column
 *
 * @method     PedidoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PedidoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PedidoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PedidoQuery leftJoinProveedor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Proveedor relation
 * @method     PedidoQuery rightJoinProveedor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Proveedor relation
 * @method     PedidoQuery innerJoinProveedor($relationAlias = null) Adds a INNER JOIN clause to the query using the Proveedor relation
 *
 * @method     PedidoQuery leftJoinPedidoProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the PedidoProducto relation
 * @method     PedidoQuery rightJoinPedidoProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PedidoProducto relation
 * @method     PedidoQuery innerJoinPedidoProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the PedidoProducto relation
 *
 * @method     Pedido findOne(PropelPDO $con = null) Return the first Pedido matching the query
 * @method     Pedido findOneOrCreate(PropelPDO $con = null) Return the first Pedido matching the query, or a new Pedido object populated from the query conditions when no match is found
 *
 * @method     Pedido findOneById(int $id) Return the first Pedido filtered by the id column
 * @method     Pedido findOneByProveedorId(int $proveedor_id) Return the first Pedido filtered by the proveedor_id column
 * @method     Pedido findOneByFechaPedido(string $fecha_pedido) Return the first Pedido filtered by the fecha_pedido column
 *
 * @method     array findById(int $id) Return Pedido objects filtered by the id column
 * @method     array findByProveedorId(int $proveedor_id) Return Pedido objects filtered by the proveedor_id column
 * @method     array findByFechaPedido(string $fecha_pedido) Return Pedido objects filtered by the fecha_pedido column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePedidoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePedidoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Pedido', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PedidoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PedidoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PedidoQuery) {
			return $criteria;
		}
		$query = new PedidoQuery();
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
	 * @return    Pedido|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PedidoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PedidoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Pedido A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PROVEEDOR_ID`, `FECHA_PEDIDO` FROM `pedido` WHERE `ID` = :p0';
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
			$obj = new Pedido();
			$obj->hydrate($row);
			PedidoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Pedido|array|mixed the result, formatted by the current formatter
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
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PedidoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PedidoPeer::ID, $keys, Criteria::IN);
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
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PedidoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the proveedor_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProveedorId(1234); // WHERE proveedor_id = 1234
	 * $query->filterByProveedorId(array(12, 34)); // WHERE proveedor_id IN (12, 34)
	 * $query->filterByProveedorId(array('min' => 12)); // WHERE proveedor_id > 12
	 * </code>
	 *
	 * @see       filterByProveedor()
	 *
	 * @param     mixed $proveedorId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function filterByProveedorId($proveedorId = null, $comparison = null)
	{
		if (is_array($proveedorId)) {
			$useMinMax = false;
			if (isset($proveedorId['min'])) {
				$this->addUsingAlias(PedidoPeer::PROVEEDOR_ID, $proveedorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($proveedorId['max'])) {
				$this->addUsingAlias(PedidoPeer::PROVEEDOR_ID, $proveedorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PedidoPeer::PROVEEDOR_ID, $proveedorId, $comparison);
	}

	/**
	 * Filter the query on the fecha_pedido column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechaPedido('2011-03-14'); // WHERE fecha_pedido = '2011-03-14'
	 * $query->filterByFechaPedido('now'); // WHERE fecha_pedido = '2011-03-14'
	 * $query->filterByFechaPedido(array('max' => 'yesterday')); // WHERE fecha_pedido > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechaPedido The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function filterByFechaPedido($fechaPedido = null, $comparison = null)
	{
		if (is_array($fechaPedido)) {
			$useMinMax = false;
			if (isset($fechaPedido['min'])) {
				$this->addUsingAlias(PedidoPeer::FECHA_PEDIDO, $fechaPedido['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaPedido['max'])) {
				$this->addUsingAlias(PedidoPeer::FECHA_PEDIDO, $fechaPedido['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PedidoPeer::FECHA_PEDIDO, $fechaPedido, $comparison);
	}

	/**
	 * Filter the query by a related Proveedor object
	 *
	 * @param     Proveedor|PropelCollection $proveedor The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function filterByProveedor($proveedor, $comparison = null)
	{
		if ($proveedor instanceof Proveedor) {
			return $this
				->addUsingAlias(PedidoPeer::PROVEEDOR_ID, $proveedor->getId(), $comparison);
		} elseif ($proveedor instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PedidoPeer::PROVEEDOR_ID, $proveedor->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByProveedor() only accepts arguments of type Proveedor or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Proveedor relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function joinProveedor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Proveedor');

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
			$this->addJoinObject($join, 'Proveedor');
		}

		return $this;
	}

	/**
	 * Use the Proveedor relation Proveedor object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProveedorQuery A secondary query class using the current class as primary query
	 */
	public function useProveedorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProveedor($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Proveedor', 'ProveedorQuery');
	}

	/**
	 * Filter the query by a related PedidoProducto object
	 *
	 * @param     PedidoProducto $pedidoProducto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function filterByPedidoProducto($pedidoProducto, $comparison = null)
	{
		if ($pedidoProducto instanceof PedidoProducto) {
			return $this
				->addUsingAlias(PedidoPeer::ID, $pedidoProducto->getPedidoId(), $comparison);
		} elseif ($pedidoProducto instanceof PropelCollection) {
			return $this
				->usePedidoProductoQuery()
				->filterByPrimaryKeys($pedidoProducto->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPedidoProducto() only accepts arguments of type PedidoProducto or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PedidoProducto relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function joinPedidoProducto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PedidoProducto');

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
			$this->addJoinObject($join, 'PedidoProducto');
		}

		return $this;
	}

	/**
	 * Use the PedidoProducto relation PedidoProducto object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PedidoProductoQuery A secondary query class using the current class as primary query
	 */
	public function usePedidoProductoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPedidoProducto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PedidoProducto', 'PedidoProductoQuery');
	}

	/**
	 * Filter the query by a related Producto object
	 * using the pedido_producto table as cross reference
	 *
	 * @param     Producto $producto the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function filterByProducto($producto, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePedidoProductoQuery()
			->filterByProducto($producto, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Pedido $pedido Object to remove from the list of results
	 *
	 * @return    PedidoQuery The current query, for fluid interface
	 */
	public function prune($pedido = null)
	{
		if ($pedido) {
			$this->addUsingAlias(PedidoPeer::ID, $pedido->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePedidoQuery