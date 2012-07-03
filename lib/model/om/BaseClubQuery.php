<?php


/**
 * Base class that represents a query for the 'club' table.
 *
 * 
 *
 * @method     ClubQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClubQuery orderByNombreClub($order = Criteria::ASC) Order by the nombre_club column
 *
 * @method     ClubQuery groupById() Group by the id column
 * @method     ClubQuery groupByNombreClub() Group by the nombre_club column
 *
 * @method     ClubQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClubQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClubQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClubQuery leftJoinInscripto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripto relation
 * @method     ClubQuery rightJoinInscripto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripto relation
 * @method     ClubQuery innerJoinInscripto($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripto relation
 *
 * @method     Club findOne(PropelPDO $con = null) Return the first Club matching the query
 * @method     Club findOneOrCreate(PropelPDO $con = null) Return the first Club matching the query, or a new Club object populated from the query conditions when no match is found
 *
 * @method     Club findOneById(int $id) Return the first Club filtered by the id column
 * @method     Club findOneByNombreClub(string $nombre_club) Return the first Club filtered by the nombre_club column
 *
 * @method     array findById(int $id) Return Club objects filtered by the id column
 * @method     array findByNombreClub(string $nombre_club) Return Club objects filtered by the nombre_club column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseClubQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClubQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Club', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClubQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClubQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClubQuery) {
			return $criteria;
		}
		$query = new ClubQuery();
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
	 * @return    Club|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClubPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClubPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Club A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOMBRE_CLUB` FROM `club` WHERE `ID` = :p0';
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
			$obj = new Club();
			$obj->hydrate($row);
			ClubPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Club|array|mixed the result, formatted by the current formatter
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
	 * @return    ClubQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClubPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClubQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClubPeer::ID, $keys, Criteria::IN);
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
	 * @return    ClubQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClubPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nombre_club column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNombreClub('fooValue');   // WHERE nombre_club = 'fooValue'
	 * $query->filterByNombreClub('%fooValue%'); // WHERE nombre_club LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nombreClub The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubQuery The current query, for fluid interface
	 */
	public function filterByNombreClub($nombreClub = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombreClub)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombreClub)) {
				$nombreClub = str_replace('*', '%', $nombreClub);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClubPeer::NOMBRE_CLUB, $nombreClub, $comparison);
	}

	/**
	 * Filter the query by a related Inscripto object
	 *
	 * @param     Inscripto $inscripto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClubQuery The current query, for fluid interface
	 */
	public function filterByInscripto($inscripto, $comparison = null)
	{
		if ($inscripto instanceof Inscripto) {
			return $this
				->addUsingAlias(ClubPeer::ID, $inscripto->getClubRepresentado(), $comparison);
		} elseif ($inscripto instanceof PropelCollection) {
			return $this
				->useInscriptoQuery()
				->filterByPrimaryKeys($inscripto->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByInscripto() only accepts arguments of type Inscripto or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Inscripto relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClubQuery The current query, for fluid interface
	 */
	public function joinInscripto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Inscripto');

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
			$this->addJoinObject($join, 'Inscripto');
		}

		return $this;
	}

	/**
	 * Use the Inscripto relation Inscripto object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InscriptoQuery A secondary query class using the current class as primary query
	 */
	public function useInscriptoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinInscripto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Inscripto', 'InscriptoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Club $club Object to remove from the list of results
	 *
	 * @return    ClubQuery The current query, for fluid interface
	 */
	public function prune($club = null)
	{
		if ($club) {
			$this->addUsingAlias(ClubPeer::ID, $club->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClubQuery