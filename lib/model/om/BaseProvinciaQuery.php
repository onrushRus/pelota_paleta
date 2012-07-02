<?php


/**
 * Base class that represents a query for the 'provincia' table.
 *
 * 
 *
 * @method     ProvinciaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProvinciaQuery orderByNombreProv($order = Criteria::ASC) Order by the nombre_prov column
 *
 * @method     ProvinciaQuery groupById() Group by the id column
 * @method     ProvinciaQuery groupByNombreProv() Group by the nombre_prov column
 *
 * @method     ProvinciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProvinciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProvinciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProvinciaQuery leftJoinLocalidad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Localidad relation
 * @method     ProvinciaQuery rightJoinLocalidad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Localidad relation
 * @method     ProvinciaQuery innerJoinLocalidad($relationAlias = null) Adds a INNER JOIN clause to the query using the Localidad relation
 *
 * @method     Provincia findOne(PropelPDO $con = null) Return the first Provincia matching the query
 * @method     Provincia findOneOrCreate(PropelPDO $con = null) Return the first Provincia matching the query, or a new Provincia object populated from the query conditions when no match is found
 *
 * @method     Provincia findOneById(int $id) Return the first Provincia filtered by the id column
 * @method     Provincia findOneByNombreProv(string $nombre_prov) Return the first Provincia filtered by the nombre_prov column
 *
 * @method     array findById(int $id) Return Provincia objects filtered by the id column
 * @method     array findByNombreProv(string $nombre_prov) Return Provincia objects filtered by the nombre_prov column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseProvinciaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProvinciaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Provincia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProvinciaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProvinciaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProvinciaQuery) {
			return $criteria;
		}
		$query = new ProvinciaQuery();
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
	 * @return    Provincia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProvinciaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProvinciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Provincia A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE_PROV` FROM `provincia` WHERE `ID` = :p0';
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
			$obj = new Provincia();
			$obj->hydrate($row);
			ProvinciaPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Provincia|array|mixed the result, formatted by the current formatter
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
	 * @return    ProvinciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProvinciaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProvinciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProvinciaPeer::ID, $keys, Criteria::IN);
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
	 * @return    ProvinciaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProvinciaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nombre_prov column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNombreProv('fooValue');   // WHERE nombre_prov = 'fooValue'
	 * $query->filterByNombreProv('%fooValue%'); // WHERE nombre_prov LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nombreProv The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProvinciaQuery The current query, for fluid interface
	 */
	public function filterByNombreProv($nombreProv = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombreProv)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombreProv)) {
				$nombreProv = str_replace('*', '%', $nombreProv);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProvinciaPeer::NOMBRE_PROV, $nombreProv, $comparison);
	}

	/**
	 * Filter the query by a related Localidad object
	 *
	 * @param     Localidad $localidad  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProvinciaQuery The current query, for fluid interface
	 */
	public function filterByLocalidad($localidad, $comparison = null)
	{
		if ($localidad instanceof Localidad) {
			return $this
				->addUsingAlias(ProvinciaPeer::ID, $localidad->getProvinciaId(), $comparison);
		} elseif ($localidad instanceof PropelCollection) {
			return $this
				->useLocalidadQuery()
				->filterByPrimaryKeys($localidad->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLocalidad() only accepts arguments of type Localidad or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Localidad relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProvinciaQuery The current query, for fluid interface
	 */
	public function joinLocalidad($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Localidad');

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
			$this->addJoinObject($join, 'Localidad');
		}

		return $this;
	}

	/**
	 * Use the Localidad relation Localidad object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LocalidadQuery A secondary query class using the current class as primary query
	 */
	public function useLocalidadQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLocalidad($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Localidad', 'LocalidadQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Provincia $provincia Object to remove from the list of results
	 *
	 * @return    ProvinciaQuery The current query, for fluid interface
	 */
	public function prune($provincia = null)
	{
		if ($provincia) {
			$this->addUsingAlias(ProvinciaPeer::ID, $provincia->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseProvinciaQuery