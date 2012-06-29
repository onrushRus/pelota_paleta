<?php


/**
 * Base class that represents a query for the 'localidad' table.
 *
 * 
 *
 * @method     LocalidadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LocalidadQuery orderByNombreLoc($order = Criteria::ASC) Order by the nombre_loc column
 * @method     LocalidadQuery orderByCodPostal($order = Criteria::ASC) Order by the cod_postal column
 * @method     LocalidadQuery orderByProvinciaId($order = Criteria::ASC) Order by the provincia_id column
 *
 * @method     LocalidadQuery groupById() Group by the id column
 * @method     LocalidadQuery groupByNombreLoc() Group by the nombre_loc column
 * @method     LocalidadQuery groupByCodPostal() Group by the cod_postal column
 * @method     LocalidadQuery groupByProvinciaId() Group by the provincia_id column
 *
 * @method     LocalidadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LocalidadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LocalidadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LocalidadQuery leftJoinProvincia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Provincia relation
 * @method     LocalidadQuery rightJoinProvincia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Provincia relation
 * @method     LocalidadQuery innerJoinProvincia($relationAlias = null) Adds a INNER JOIN clause to the query using the Provincia relation
 *
 * @method     LocalidadQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     LocalidadQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     LocalidadQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     Localidad findOne(PropelPDO $con = null) Return the first Localidad matching the query
 * @method     Localidad findOneOrCreate(PropelPDO $con = null) Return the first Localidad matching the query, or a new Localidad object populated from the query conditions when no match is found
 *
 * @method     Localidad findOneById(int $id) Return the first Localidad filtered by the id column
 * @method     Localidad findOneByNombreLoc(string $nombre_loc) Return the first Localidad filtered by the nombre_loc column
 * @method     Localidad findOneByCodPostal(string $cod_postal) Return the first Localidad filtered by the cod_postal column
 * @method     Localidad findOneByProvinciaId(int $provincia_id) Return the first Localidad filtered by the provincia_id column
 *
 * @method     array findById(int $id) Return Localidad objects filtered by the id column
 * @method     array findByNombreLoc(string $nombre_loc) Return Localidad objects filtered by the nombre_loc column
 * @method     array findByCodPostal(string $cod_postal) Return Localidad objects filtered by the cod_postal column
 * @method     array findByProvinciaId(int $provincia_id) Return Localidad objects filtered by the provincia_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseLocalidadQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseLocalidadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Localidad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LocalidadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LocalidadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LocalidadQuery) {
			return $criteria;
		}
		$query = new LocalidadQuery();
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
	 * @return    Localidad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = LocalidadPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(LocalidadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Localidad A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE_LOC`, `COD_POSTAL`, `PROVINCIA_ID` FROM `localidad` WHERE `ID` = :p0';
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
			$obj = new Localidad();
			$obj->hydrate($row);
			LocalidadPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Localidad|array|mixed the result, formatted by the current formatter
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
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LocalidadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LocalidadPeer::ID, $keys, Criteria::IN);
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
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LocalidadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nombre_loc column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNombreLoc('fooValue');   // WHERE nombre_loc = 'fooValue'
	 * $query->filterByNombreLoc('%fooValue%'); // WHERE nombre_loc LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nombreLoc The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function filterByNombreLoc($nombreLoc = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombreLoc)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombreLoc)) {
				$nombreLoc = str_replace('*', '%', $nombreLoc);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LocalidadPeer::NOMBRE_LOC, $nombreLoc, $comparison);
	}

	/**
	 * Filter the query on the cod_postal column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCodPostal('fooValue');   // WHERE cod_postal = 'fooValue'
	 * $query->filterByCodPostal('%fooValue%'); // WHERE cod_postal LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $codPostal The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function filterByCodPostal($codPostal = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($codPostal)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $codPostal)) {
				$codPostal = str_replace('*', '%', $codPostal);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LocalidadPeer::COD_POSTAL, $codPostal, $comparison);
	}

	/**
	 * Filter the query on the provincia_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProvinciaId(1234); // WHERE provincia_id = 1234
	 * $query->filterByProvinciaId(array(12, 34)); // WHERE provincia_id IN (12, 34)
	 * $query->filterByProvinciaId(array('min' => 12)); // WHERE provincia_id > 12
	 * </code>
	 *
	 * @see       filterByProvincia()
	 *
	 * @param     mixed $provinciaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function filterByProvinciaId($provinciaId = null, $comparison = null)
	{
		if (is_array($provinciaId)) {
			$useMinMax = false;
			if (isset($provinciaId['min'])) {
				$this->addUsingAlias(LocalidadPeer::PROVINCIA_ID, $provinciaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($provinciaId['max'])) {
				$this->addUsingAlias(LocalidadPeer::PROVINCIA_ID, $provinciaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LocalidadPeer::PROVINCIA_ID, $provinciaId, $comparison);
	}

	/**
	 * Filter the query by a related Provincia object
	 *
	 * @param     Provincia|PropelCollection $provincia The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function filterByProvincia($provincia, $comparison = null)
	{
		if ($provincia instanceof Provincia) {
			return $this
				->addUsingAlias(LocalidadPeer::PROVINCIA_ID, $provincia->getId(), $comparison);
		} elseif ($provincia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(LocalidadPeer::PROVINCIA_ID, $provincia->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByProvincia() only accepts arguments of type Provincia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Provincia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function joinProvincia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Provincia');

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
			$this->addJoinObject($join, 'Provincia');
		}

		return $this;
	}

	/**
	 * Use the Provincia relation Provincia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProvinciaQuery A secondary query class using the current class as primary query
	 */
	public function useProvinciaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProvincia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Provincia', 'ProvinciaQuery');
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona $persona  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		if ($persona instanceof Persona) {
			return $this
				->addUsingAlias(LocalidadPeer::ID, $persona->getLocalidadId(), $comparison);
		} elseif ($persona instanceof PropelCollection) {
			return $this
				->usePersonaQuery()
				->filterByPrimaryKeys($persona->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPersona() only accepts arguments of type Persona or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Persona relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function joinPersona($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Persona');

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
			$this->addJoinObject($join, 'Persona');
		}

		return $this;
	}

	/**
	 * Use the Persona relation Persona object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaQuery A secondary query class using the current class as primary query
	 */
	public function usePersonaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPersona($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Persona', 'PersonaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Localidad $localidad Object to remove from the list of results
	 *
	 * @return    LocalidadQuery The current query, for fluid interface
	 */
	public function prune($localidad = null)
	{
		if ($localidad) {
			$this->addUsingAlias(LocalidadPeer::ID, $localidad->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseLocalidadQuery