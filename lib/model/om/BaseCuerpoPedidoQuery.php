<?php


/**
 * Base class that represents a query for the 'cuerpo_pedido' table.
 *
 * 
 *
 * @method     CuerpoPedidoQuery orderByEncabezadoPedidoId($order = Criteria::ASC) Order by the encabezado_pedido_id column
 * @method     CuerpoPedidoQuery orderByProductoId($order = Criteria::ASC) Order by the producto_id column
 * @method     CuerpoPedidoQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     CuerpoPedidoQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     CuerpoPedidoQuery groupByEncabezadoPedidoId() Group by the encabezado_pedido_id column
 * @method     CuerpoPedidoQuery groupByProductoId() Group by the producto_id column
 * @method     CuerpoPedidoQuery groupByCantidad() Group by the cantidad column
 * @method     CuerpoPedidoQuery groupById() Group by the id column
 *
 * @method     CuerpoPedidoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CuerpoPedidoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CuerpoPedidoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CuerpoPedidoQuery leftJoinEncabezadoPedido($relationAlias = null) Adds a LEFT JOIN clause to the query using the EncabezadoPedido relation
 * @method     CuerpoPedidoQuery rightJoinEncabezadoPedido($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EncabezadoPedido relation
 * @method     CuerpoPedidoQuery innerJoinEncabezadoPedido($relationAlias = null) Adds a INNER JOIN clause to the query using the EncabezadoPedido relation
 *
 * @method     CuerpoPedidoQuery leftJoinProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Producto relation
 * @method     CuerpoPedidoQuery rightJoinProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Producto relation
 * @method     CuerpoPedidoQuery innerJoinProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the Producto relation
 *
 * @method     CuerpoPedido findOne(PropelPDO $con = null) Return the first CuerpoPedido matching the query
 * @method     CuerpoPedido findOneOrCreate(PropelPDO $con = null) Return the first CuerpoPedido matching the query, or a new CuerpoPedido object populated from the query conditions when no match is found
 *
 * @method     CuerpoPedido findOneByEncabezadoPedidoId(int $encabezado_pedido_id) Return the first CuerpoPedido filtered by the encabezado_pedido_id column
 * @method     CuerpoPedido findOneByProductoId(int $producto_id) Return the first CuerpoPedido filtered by the producto_id column
 * @method     CuerpoPedido findOneByCantidad(int $cantidad) Return the first CuerpoPedido filtered by the cantidad column
 * @method     CuerpoPedido findOneById(int $id) Return the first CuerpoPedido filtered by the id column
 *
 * @method     array findByEncabezadoPedidoId(int $encabezado_pedido_id) Return CuerpoPedido objects filtered by the encabezado_pedido_id column
 * @method     array findByProductoId(int $producto_id) Return CuerpoPedido objects filtered by the producto_id column
 * @method     array findByCantidad(int $cantidad) Return CuerpoPedido objects filtered by the cantidad column
 * @method     array findById(int $id) Return CuerpoPedido objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCuerpoPedidoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCuerpoPedidoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'CuerpoPedido', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CuerpoPedidoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CuerpoPedidoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CuerpoPedidoQuery) {
			return $criteria;
		}
		$query = new CuerpoPedidoQuery();
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
	 * @return    CuerpoPedido|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CuerpoPedidoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CuerpoPedidoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    CuerpoPedido A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ENCABEZADO_PEDIDO_ID`, `PRODUCTO_ID`, `CANTIDAD`, `ID` FROM `cuerpo_pedido` WHERE `ID` = :p0';
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
			$obj = new CuerpoPedido();
			$obj->hydrate($row);
			CuerpoPedidoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    CuerpoPedido|array|mixed the result, formatted by the current formatter
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
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CuerpoPedidoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CuerpoPedidoPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the encabezado_pedido_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEncabezadoPedidoId(1234); // WHERE encabezado_pedido_id = 1234
	 * $query->filterByEncabezadoPedidoId(array(12, 34)); // WHERE encabezado_pedido_id IN (12, 34)
	 * $query->filterByEncabezadoPedidoId(array('min' => 12)); // WHERE encabezado_pedido_id > 12
	 * </code>
	 *
	 * @see       filterByEncabezadoPedido()
	 *
	 * @param     mixed $encabezadoPedidoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function filterByEncabezadoPedidoId($encabezadoPedidoId = null, $comparison = null)
	{
		if (is_array($encabezadoPedidoId)) {
			$useMinMax = false;
			if (isset($encabezadoPedidoId['min'])) {
				$this->addUsingAlias(CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID, $encabezadoPedidoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($encabezadoPedidoId['max'])) {
				$this->addUsingAlias(CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID, $encabezadoPedidoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID, $encabezadoPedidoId, $comparison);
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
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function filterByProductoId($productoId = null, $comparison = null)
	{
		if (is_array($productoId)) {
			$useMinMax = false;
			if (isset($productoId['min'])) {
				$this->addUsingAlias(CuerpoPedidoPeer::PRODUCTO_ID, $productoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($productoId['max'])) {
				$this->addUsingAlias(CuerpoPedidoPeer::PRODUCTO_ID, $productoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CuerpoPedidoPeer::PRODUCTO_ID, $productoId, $comparison);
	}

	/**
	 * Filter the query on the cantidad column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCantidad(1234); // WHERE cantidad = 1234
	 * $query->filterByCantidad(array(12, 34)); // WHERE cantidad IN (12, 34)
	 * $query->filterByCantidad(array('min' => 12)); // WHERE cantidad > 12
	 * </code>
	 *
	 * @param     mixed $cantidad The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function filterByCantidad($cantidad = null, $comparison = null)
	{
		if (is_array($cantidad)) {
			$useMinMax = false;
			if (isset($cantidad['min'])) {
				$this->addUsingAlias(CuerpoPedidoPeer::CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cantidad['max'])) {
				$this->addUsingAlias(CuerpoPedidoPeer::CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CuerpoPedidoPeer::CANTIDAD, $cantidad, $comparison);
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
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CuerpoPedidoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query by a related EncabezadoPedido object
	 *
	 * @param     EncabezadoPedido|PropelCollection $encabezadoPedido The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function filterByEncabezadoPedido($encabezadoPedido, $comparison = null)
	{
		if ($encabezadoPedido instanceof EncabezadoPedido) {
			return $this
				->addUsingAlias(CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID, $encabezadoPedido->getId(), $comparison);
		} elseif ($encabezadoPedido instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID, $encabezadoPedido->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByEncabezadoPedido() only accepts arguments of type EncabezadoPedido or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the EncabezadoPedido relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function joinEncabezadoPedido($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('EncabezadoPedido');

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
			$this->addJoinObject($join, 'EncabezadoPedido');
		}

		return $this;
	}

	/**
	 * Use the EncabezadoPedido relation EncabezadoPedido object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EncabezadoPedidoQuery A secondary query class using the current class as primary query
	 */
	public function useEncabezadoPedidoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEncabezadoPedido($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'EncabezadoPedido', 'EncabezadoPedidoQuery');
	}

	/**
	 * Filter the query by a related Producto object
	 *
	 * @param     Producto|PropelCollection $producto The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function filterByProducto($producto, $comparison = null)
	{
		if ($producto instanceof Producto) {
			return $this
				->addUsingAlias(CuerpoPedidoPeer::PRODUCTO_ID, $producto->getId(), $comparison);
		} elseif ($producto instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CuerpoPedidoPeer::PRODUCTO_ID, $producto->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
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
	 * @param     CuerpoPedido $cuerpoPedido Object to remove from the list of results
	 *
	 * @return    CuerpoPedidoQuery The current query, for fluid interface
	 */
	public function prune($cuerpoPedido = null)
	{
		if ($cuerpoPedido) {
			$this->addUsingAlias(CuerpoPedidoPeer::ID, $cuerpoPedido->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCuerpoPedidoQuery