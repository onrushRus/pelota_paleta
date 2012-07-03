<?php


/**
 * Base class that represents a query for the 'producto' table.
 *
 * 
 *
 * @method     ProductoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProductoQuery orderByDescripcionProd($order = Criteria::ASC) Order by the descripcion_prod column
 * @method     ProductoQuery orderByMarca($order = Criteria::ASC) Order by the marca column
 * @method     ProductoQuery orderByPresentacion($order = Criteria::ASC) Order by the presentacion column
 * @method     ProductoQuery orderByPrecio($order = Criteria::ASC) Order by the precio column
 *
 * @method     ProductoQuery groupById() Group by the id column
 * @method     ProductoQuery groupByDescripcionProd() Group by the descripcion_prod column
 * @method     ProductoQuery groupByMarca() Group by the marca column
 * @method     ProductoQuery groupByPresentacion() Group by the presentacion column
 * @method     ProductoQuery groupByPrecio() Group by the precio column
 *
 * @method     ProductoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProductoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProductoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProductoQuery leftJoinPedidoProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the PedidoProducto relation
 * @method     ProductoQuery rightJoinPedidoProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PedidoProducto relation
 * @method     ProductoQuery innerJoinPedidoProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the PedidoProducto relation
 *
 * @method     ProductoQuery leftJoinStock($relationAlias = null) Adds a LEFT JOIN clause to the query using the Stock relation
 * @method     ProductoQuery rightJoinStock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Stock relation
 * @method     ProductoQuery innerJoinStock($relationAlias = null) Adds a INNER JOIN clause to the query using the Stock relation
 *
 * @method     Producto findOne(PropelPDO $con = null) Return the first Producto matching the query
 * @method     Producto findOneOrCreate(PropelPDO $con = null) Return the first Producto matching the query, or a new Producto object populated from the query conditions when no match is found
 *
 * @method     Producto findOneById(int $id) Return the first Producto filtered by the id column
 * @method     Producto findOneByDescripcionProd(string $descripcion_prod) Return the first Producto filtered by the descripcion_prod column
 * @method     Producto findOneByMarca(string $marca) Return the first Producto filtered by the marca column
 * @method     Producto findOneByPresentacion(string $presentacion) Return the first Producto filtered by the presentacion column
 * @method     Producto findOneByPrecio(string $precio) Return the first Producto filtered by the precio column
 *
 * @method     array findById(int $id) Return Producto objects filtered by the id column
 * @method     array findByDescripcionProd(string $descripcion_prod) Return Producto objects filtered by the descripcion_prod column
 * @method     array findByMarca(string $marca) Return Producto objects filtered by the marca column
 * @method     array findByPresentacion(string $presentacion) Return Producto objects filtered by the presentacion column
 * @method     array findByPrecio(string $precio) Return Producto objects filtered by the precio column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseProductoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProductoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Producto', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProductoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProductoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProductoQuery) {
			return $criteria;
		}
		$query = new ProductoQuery();
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
	 * @return    Producto|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProductoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProductoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Producto A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DESCRIPCION_PROD`, `MARCA`, `PRESENTACION`, `PRECIO` FROM `producto` WHERE `ID` = :p0';
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
			$obj = new Producto();
			$obj->hydrate($row);
			ProductoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Producto|array|mixed the result, formatted by the current formatter
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
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProductoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProductoPeer::ID, $keys, Criteria::IN);
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
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProductoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the descripcion_prod column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescripcionProd('fooValue');   // WHERE descripcion_prod = 'fooValue'
	 * $query->filterByDescripcionProd('%fooValue%'); // WHERE descripcion_prod LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descripcionProd The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByDescripcionProd($descripcionProd = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descripcionProd)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descripcionProd)) {
				$descripcionProd = str_replace('*', '%', $descripcionProd);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductoPeer::DESCRIPCION_PROD, $descripcionProd, $comparison);
	}

	/**
	 * Filter the query on the marca column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMarca('fooValue');   // WHERE marca = 'fooValue'
	 * $query->filterByMarca('%fooValue%'); // WHERE marca LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $marca The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByMarca($marca = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($marca)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $marca)) {
				$marca = str_replace('*', '%', $marca);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductoPeer::MARCA, $marca, $comparison);
	}

	/**
	 * Filter the query on the presentacion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPresentacion('fooValue');   // WHERE presentacion = 'fooValue'
	 * $query->filterByPresentacion('%fooValue%'); // WHERE presentacion LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $presentacion The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPresentacion($presentacion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($presentacion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $presentacion)) {
				$presentacion = str_replace('*', '%', $presentacion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductoPeer::PRESENTACION, $presentacion, $comparison);
	}

	/**
	 * Filter the query on the precio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrecio(1234); // WHERE precio = 1234
	 * $query->filterByPrecio(array(12, 34)); // WHERE precio IN (12, 34)
	 * $query->filterByPrecio(array('min' => 12)); // WHERE precio > 12
	 * </code>
	 *
	 * @param     mixed $precio The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPrecio($precio = null, $comparison = null)
	{
		if (is_array($precio)) {
			$useMinMax = false;
			if (isset($precio['min'])) {
				$this->addUsingAlias(ProductoPeer::PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($precio['max'])) {
				$this->addUsingAlias(ProductoPeer::PRECIO, $precio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductoPeer::PRECIO, $precio, $comparison);
	}

	/**
	 * Filter the query by a related PedidoProducto object
	 *
	 * @param     PedidoProducto $pedidoProducto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPedidoProducto($pedidoProducto, $comparison = null)
	{
		if ($pedidoProducto instanceof PedidoProducto) {
			return $this
				->addUsingAlias(ProductoPeer::ID, $pedidoProducto->getProductoId(), $comparison);
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
	 * @return    ProductoQuery The current query, for fluid interface
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
	 * Filter the query by a related Stock object
	 *
	 * @param     Stock $stock  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByStock($stock, $comparison = null)
	{
		if ($stock instanceof Stock) {
			return $this
				->addUsingAlias(ProductoPeer::ID, $stock->getProductoId(), $comparison);
		} elseif ($stock instanceof PropelCollection) {
			return $this
				->useStockQuery()
				->filterByPrimaryKeys($stock->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByStock() only accepts arguments of type Stock or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Stock relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function joinStock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Stock');

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
			$this->addJoinObject($join, 'Stock');
		}

		return $this;
	}

	/**
	 * Use the Stock relation Stock object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StockQuery A secondary query class using the current class as primary query
	 */
	public function useStockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinStock($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Stock', 'StockQuery');
	}

	/**
	 * Filter the query by a related Pedido object
	 * using the pedido_producto table as cross reference
	 *
	 * @param     Pedido $pedido the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPedido($pedido, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePedidoProductoQuery()
			->filterByPedido($pedido, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Producto $producto Object to remove from the list of results
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function prune($producto = null)
	{
		if ($producto) {
			$this->addUsingAlias(ProductoPeer::ID, $producto->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseProductoQuery