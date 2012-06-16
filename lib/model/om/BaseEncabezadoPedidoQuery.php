<?php


/**
 * Base class that represents a query for the 'encabezado_pedido' table.
 *
 * 
 *
 * @method     EncabezadoPedidoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EncabezadoPedidoQuery orderByProveedorId($order = Criteria::ASC) Order by the proveedor_id column
 *
 * @method     EncabezadoPedidoQuery groupById() Group by the id column
 * @method     EncabezadoPedidoQuery groupByProveedorId() Group by the proveedor_id column
 *
 * @method     EncabezadoPedidoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EncabezadoPedidoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EncabezadoPedidoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EncabezadoPedidoQuery leftJoinProveedor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Proveedor relation
 * @method     EncabezadoPedidoQuery rightJoinProveedor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Proveedor relation
 * @method     EncabezadoPedidoQuery innerJoinProveedor($relationAlias = null) Adds a INNER JOIN clause to the query using the Proveedor relation
 *
 * @method     EncabezadoPedidoQuery leftJoinCuerpoPedido($relationAlias = null) Adds a LEFT JOIN clause to the query using the CuerpoPedido relation
 * @method     EncabezadoPedidoQuery rightJoinCuerpoPedido($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CuerpoPedido relation
 * @method     EncabezadoPedidoQuery innerJoinCuerpoPedido($relationAlias = null) Adds a INNER JOIN clause to the query using the CuerpoPedido relation
 *
 * @method     EncabezadoPedido findOne(PropelPDO $con = null) Return the first EncabezadoPedido matching the query
 * @method     EncabezadoPedido findOneOrCreate(PropelPDO $con = null) Return the first EncabezadoPedido matching the query, or a new EncabezadoPedido object populated from the query conditions when no match is found
 *
 * @method     EncabezadoPedido findOneById(int $id) Return the first EncabezadoPedido filtered by the id column
 * @method     EncabezadoPedido findOneByProveedorId(int $proveedor_id) Return the first EncabezadoPedido filtered by the proveedor_id column
 *
 * @method     array findById(int $id) Return EncabezadoPedido objects filtered by the id column
 * @method     array findByProveedorId(int $proveedor_id) Return EncabezadoPedido objects filtered by the proveedor_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEncabezadoPedidoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEncabezadoPedidoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'EncabezadoPedido', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EncabezadoPedidoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EncabezadoPedidoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EncabezadoPedidoQuery) {
			return $criteria;
		}
		$query = new EncabezadoPedidoQuery();
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
	 * @return    EncabezadoPedido|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = EncabezadoPedidoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(EncabezadoPedidoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    EncabezadoPedido A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PROVEEDOR_ID` FROM `encabezado_pedido` WHERE `ID` = :p0';
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
			$obj = new EncabezadoPedido();
			$obj->hydrate($row);
			EncabezadoPedidoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    EncabezadoPedido|array|mixed the result, formatted by the current formatter
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
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EncabezadoPedidoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EncabezadoPedidoPeer::ID, $keys, Criteria::IN);
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
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EncabezadoPedidoPeer::ID, $id, $comparison);
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
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
	 */
	public function filterByProveedorId($proveedorId = null, $comparison = null)
	{
		if (is_array($proveedorId)) {
			$useMinMax = false;
			if (isset($proveedorId['min'])) {
				$this->addUsingAlias(EncabezadoPedidoPeer::PROVEEDOR_ID, $proveedorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($proveedorId['max'])) {
				$this->addUsingAlias(EncabezadoPedidoPeer::PROVEEDOR_ID, $proveedorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EncabezadoPedidoPeer::PROVEEDOR_ID, $proveedorId, $comparison);
	}

	/**
	 * Filter the query by a related Proveedor object
	 *
	 * @param     Proveedor|PropelCollection $proveedor The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
	 */
	public function filterByProveedor($proveedor, $comparison = null)
	{
		if ($proveedor instanceof Proveedor) {
			return $this
				->addUsingAlias(EncabezadoPedidoPeer::PROVEEDOR_ID, $proveedor->getId(), $comparison);
		} elseif ($proveedor instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(EncabezadoPedidoPeer::PROVEEDOR_ID, $proveedor->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
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
	 * Filter the query by a related CuerpoPedido object
	 *
	 * @param     CuerpoPedido $cuerpoPedido  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
	 */
	public function filterByCuerpoPedido($cuerpoPedido, $comparison = null)
	{
		if ($cuerpoPedido instanceof CuerpoPedido) {
			return $this
				->addUsingAlias(EncabezadoPedidoPeer::ID, $cuerpoPedido->getEncabezadoPedidoId(), $comparison);
		} elseif ($cuerpoPedido instanceof PropelCollection) {
			return $this
				->useCuerpoPedidoQuery()
				->filterByPrimaryKeys($cuerpoPedido->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCuerpoPedido() only accepts arguments of type CuerpoPedido or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the CuerpoPedido relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
	 */
	public function joinCuerpoPedido($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CuerpoPedido');

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
			$this->addJoinObject($join, 'CuerpoPedido');
		}

		return $this;
	}

	/**
	 * Use the CuerpoPedido relation CuerpoPedido object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CuerpoPedidoQuery A secondary query class using the current class as primary query
	 */
	public function useCuerpoPedidoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCuerpoPedido($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CuerpoPedido', 'CuerpoPedidoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     EncabezadoPedido $encabezadoPedido Object to remove from the list of results
	 *
	 * @return    EncabezadoPedidoQuery The current query, for fluid interface
	 */
	public function prune($encabezadoPedido = null)
	{
		if ($encabezadoPedido) {
			$this->addUsingAlias(EncabezadoPedidoPeer::ID, $encabezadoPedido->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEncabezadoPedidoQuery