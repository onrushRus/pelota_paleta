<?php


/**
 * Base class that represents a query for the 'proveedor' table.
 *
 * 
 *
 * @method     ProveedorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProveedorQuery orderByNombreProveedor($order = Criteria::ASC) Order by the nombre_proveedor column
 * @method     ProveedorQuery orderByDomCalle($order = Criteria::ASC) Order by the dom_calle column
 * @method     ProveedorQuery orderByDomNro($order = Criteria::ASC) Order by the dom_nro column
 * @method     ProveedorQuery orderByDomPiso($order = Criteria::ASC) Order by the dom_piso column
 * @method     ProveedorQuery orderByDomDpto($order = Criteria::ASC) Order by the dom_dpto column
 * @method     ProveedorQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 *
 * @method     ProveedorQuery groupById() Group by the id column
 * @method     ProveedorQuery groupByNombreProveedor() Group by the nombre_proveedor column
 * @method     ProveedorQuery groupByDomCalle() Group by the dom_calle column
 * @method     ProveedorQuery groupByDomNro() Group by the dom_nro column
 * @method     ProveedorQuery groupByDomPiso() Group by the dom_piso column
 * @method     ProveedorQuery groupByDomDpto() Group by the dom_dpto column
 * @method     ProveedorQuery groupByTelefono() Group by the telefono column
 *
 * @method     ProveedorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProveedorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProveedorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProveedorQuery leftJoinPedido($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pedido relation
 * @method     ProveedorQuery rightJoinPedido($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pedido relation
 * @method     ProveedorQuery innerJoinPedido($relationAlias = null) Adds a INNER JOIN clause to the query using the Pedido relation
 *
 * @method     Proveedor findOne(PropelPDO $con = null) Return the first Proveedor matching the query
 * @method     Proveedor findOneOrCreate(PropelPDO $con = null) Return the first Proveedor matching the query, or a new Proveedor object populated from the query conditions when no match is found
 *
 * @method     Proveedor findOneById(int $id) Return the first Proveedor filtered by the id column
 * @method     Proveedor findOneByNombreProveedor(string $nombre_proveedor) Return the first Proveedor filtered by the nombre_proveedor column
 * @method     Proveedor findOneByDomCalle(string $dom_calle) Return the first Proveedor filtered by the dom_calle column
 * @method     Proveedor findOneByDomNro(string $dom_nro) Return the first Proveedor filtered by the dom_nro column
 * @method     Proveedor findOneByDomPiso(string $dom_piso) Return the first Proveedor filtered by the dom_piso column
 * @method     Proveedor findOneByDomDpto(string $dom_dpto) Return the first Proveedor filtered by the dom_dpto column
 * @method     Proveedor findOneByTelefono(string $telefono) Return the first Proveedor filtered by the telefono column
 *
 * @method     array findById(int $id) Return Proveedor objects filtered by the id column
 * @method     array findByNombreProveedor(string $nombre_proveedor) Return Proveedor objects filtered by the nombre_proveedor column
 * @method     array findByDomCalle(string $dom_calle) Return Proveedor objects filtered by the dom_calle column
 * @method     array findByDomNro(string $dom_nro) Return Proveedor objects filtered by the dom_nro column
 * @method     array findByDomPiso(string $dom_piso) Return Proveedor objects filtered by the dom_piso column
 * @method     array findByDomDpto(string $dom_dpto) Return Proveedor objects filtered by the dom_dpto column
 * @method     array findByTelefono(string $telefono) Return Proveedor objects filtered by the telefono column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseProveedorQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProveedorQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Proveedor', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProveedorQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProveedorQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProveedorQuery) {
			return $criteria;
		}
		$query = new ProveedorQuery();
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
	 * @return    Proveedor|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProveedorPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProveedorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Proveedor A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE_PROVEEDOR`, `DOM_CALLE`, `DOM_NRO`, `DOM_PISO`, `DOM_DPTO`, `TELEFONO` FROM `proveedor` WHERE `ID` = :p0';
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
			$obj = new Proveedor();
			$obj->hydrate($row);
			ProveedorPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Proveedor|array|mixed the result, formatted by the current formatter
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
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProveedorPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProveedorPeer::ID, $keys, Criteria::IN);
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
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProveedorPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nombre_proveedor column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNombreProveedor('fooValue');   // WHERE nombre_proveedor = 'fooValue'
	 * $query->filterByNombreProveedor('%fooValue%'); // WHERE nombre_proveedor LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nombreProveedor The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByNombreProveedor($nombreProveedor = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombreProveedor)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombreProveedor)) {
				$nombreProveedor = str_replace('*', '%', $nombreProveedor);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProveedorPeer::NOMBRE_PROVEEDOR, $nombreProveedor, $comparison);
	}

	/**
	 * Filter the query on the dom_calle column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDomCalle('fooValue');   // WHERE dom_calle = 'fooValue'
	 * $query->filterByDomCalle('%fooValue%'); // WHERE dom_calle LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $domCalle The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByDomCalle($domCalle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domCalle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domCalle)) {
				$domCalle = str_replace('*', '%', $domCalle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProveedorPeer::DOM_CALLE, $domCalle, $comparison);
	}

	/**
	 * Filter the query on the dom_nro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDomNro('fooValue');   // WHERE dom_nro = 'fooValue'
	 * $query->filterByDomNro('%fooValue%'); // WHERE dom_nro LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $domNro The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByDomNro($domNro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domNro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domNro)) {
				$domNro = str_replace('*', '%', $domNro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProveedorPeer::DOM_NRO, $domNro, $comparison);
	}

	/**
	 * Filter the query on the dom_piso column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDomPiso('fooValue');   // WHERE dom_piso = 'fooValue'
	 * $query->filterByDomPiso('%fooValue%'); // WHERE dom_piso LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $domPiso The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByDomPiso($domPiso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domPiso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domPiso)) {
				$domPiso = str_replace('*', '%', $domPiso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProveedorPeer::DOM_PISO, $domPiso, $comparison);
	}

	/**
	 * Filter the query on the dom_dpto column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDomDpto('fooValue');   // WHERE dom_dpto = 'fooValue'
	 * $query->filterByDomDpto('%fooValue%'); // WHERE dom_dpto LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $domDpto The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByDomDpto($domDpto = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domDpto)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domDpto)) {
				$domDpto = str_replace('*', '%', $domDpto);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProveedorPeer::DOM_DPTO, $domDpto, $comparison);
	}

	/**
	 * Filter the query on the telefono column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTelefono('fooValue');   // WHERE telefono = 'fooValue'
	 * $query->filterByTelefono('%fooValue%'); // WHERE telefono LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telefono The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByTelefono($telefono = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefono)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefono)) {
				$telefono = str_replace('*', '%', $telefono);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProveedorPeer::TELEFONO, $telefono, $comparison);
	}

	/**
	 * Filter the query by a related Pedido object
	 *
	 * @param     Pedido $pedido  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function filterByPedido($pedido, $comparison = null)
	{
		if ($pedido instanceof Pedido) {
			return $this
				->addUsingAlias(ProveedorPeer::ID, $pedido->getProveedorId(), $comparison);
		} elseif ($pedido instanceof PropelCollection) {
			return $this
				->usePedidoQuery()
				->filterByPrimaryKeys($pedido->getPrimaryKeys())
				->endUse();
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
	 * @return    ProveedorQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Proveedor $proveedor Object to remove from the list of results
	 *
	 * @return    ProveedorQuery The current query, for fluid interface
	 */
	public function prune($proveedor = null)
	{
		if ($proveedor) {
			$this->addUsingAlias(ProveedorPeer::ID, $proveedor->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseProveedorQuery