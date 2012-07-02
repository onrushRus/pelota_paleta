<?php


/**
 * Base class that represents a query for the 'resultado_torneo' table.
 *
 * 
 *
 * @method     ResultadoTorneoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ResultadoTorneoQuery orderByPuestoId($order = Criteria::ASC) Order by the puesto_id column
 * @method     ResultadoTorneoQuery orderByTorneoCatId($order = Criteria::ASC) Order by the torneo_cat_id column
 * @method     ResultadoTorneoQuery orderByPelotariNroDoc($order = Criteria::ASC) Order by the pelotari_nro_doc column
 *
 * @method     ResultadoTorneoQuery groupById() Group by the id column
 * @method     ResultadoTorneoQuery groupByPuestoId() Group by the puesto_id column
 * @method     ResultadoTorneoQuery groupByTorneoCatId() Group by the torneo_cat_id column
 * @method     ResultadoTorneoQuery groupByPelotariNroDoc() Group by the pelotari_nro_doc column
 *
 * @method     ResultadoTorneoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ResultadoTorneoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ResultadoTorneoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ResultadoTorneoQuery leftJoinPuntosPuesto($relationAlias = null) Adds a LEFT JOIN clause to the query using the PuntosPuesto relation
 * @method     ResultadoTorneoQuery rightJoinPuntosPuesto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PuntosPuesto relation
 * @method     ResultadoTorneoQuery innerJoinPuntosPuesto($relationAlias = null) Adds a INNER JOIN clause to the query using the PuntosPuesto relation
 *
 * @method     ResultadoTorneoQuery leftJoinTorneoCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the TorneoCategoria relation
 * @method     ResultadoTorneoQuery rightJoinTorneoCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TorneoCategoria relation
 * @method     ResultadoTorneoQuery innerJoinTorneoCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the TorneoCategoria relation
 *
 * @method     ResultadoTorneoQuery leftJoinInscripto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripto relation
 * @method     ResultadoTorneoQuery rightJoinInscripto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripto relation
 * @method     ResultadoTorneoQuery innerJoinInscripto($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripto relation
 *
 * @method     ResultadoTorneo findOne(PropelPDO $con = null) Return the first ResultadoTorneo matching the query
 * @method     ResultadoTorneo findOneOrCreate(PropelPDO $con = null) Return the first ResultadoTorneo matching the query, or a new ResultadoTorneo object populated from the query conditions when no match is found
 *
 * @method     ResultadoTorneo findOneById(int $id) Return the first ResultadoTorneo filtered by the id column
 * @method     ResultadoTorneo findOneByPuestoId(int $puesto_id) Return the first ResultadoTorneo filtered by the puesto_id column
 * @method     ResultadoTorneo findOneByTorneoCatId(int $torneo_cat_id) Return the first ResultadoTorneo filtered by the torneo_cat_id column
 * @method     ResultadoTorneo findOneByPelotariNroDoc(int $pelotari_nro_doc) Return the first ResultadoTorneo filtered by the pelotari_nro_doc column
 *
 * @method     array findById(int $id) Return ResultadoTorneo objects filtered by the id column
 * @method     array findByPuestoId(int $puesto_id) Return ResultadoTorneo objects filtered by the puesto_id column
 * @method     array findByTorneoCatId(int $torneo_cat_id) Return ResultadoTorneo objects filtered by the torneo_cat_id column
 * @method     array findByPelotariNroDoc(int $pelotari_nro_doc) Return ResultadoTorneo objects filtered by the pelotari_nro_doc column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseResultadoTorneoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseResultadoTorneoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ResultadoTorneo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ResultadoTorneoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ResultadoTorneoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ResultadoTorneoQuery) {
			return $criteria;
		}
		$query = new ResultadoTorneoQuery();
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
	 * @return    ResultadoTorneo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ResultadoTorneoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ResultadoTorneoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ResultadoTorneo A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PUESTO_ID`, `TORNEO_CAT_ID`, `PELOTARI_NRO_DOC` FROM `resultado_torneo` WHERE `ID` = :p0';
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
			$obj = new ResultadoTorneo();
			$obj->hydrate($row);
			ResultadoTorneoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    ResultadoTorneo|array|mixed the result, formatted by the current formatter
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
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ResultadoTorneoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ResultadoTorneoPeer::ID, $keys, Criteria::IN);
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
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ResultadoTorneoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the puesto_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPuestoId(1234); // WHERE puesto_id = 1234
	 * $query->filterByPuestoId(array(12, 34)); // WHERE puesto_id IN (12, 34)
	 * $query->filterByPuestoId(array('min' => 12)); // WHERE puesto_id > 12
	 * </code>
	 *
	 * @see       filterByPuntosPuesto()
	 *
	 * @param     mixed $puestoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterByPuestoId($puestoId = null, $comparison = null)
	{
		if (is_array($puestoId)) {
			$useMinMax = false;
			if (isset($puestoId['min'])) {
				$this->addUsingAlias(ResultadoTorneoPeer::PUESTO_ID, $puestoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($puestoId['max'])) {
				$this->addUsingAlias(ResultadoTorneoPeer::PUESTO_ID, $puestoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ResultadoTorneoPeer::PUESTO_ID, $puestoId, $comparison);
	}

	/**
	 * Filter the query on the torneo_cat_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTorneoCatId(1234); // WHERE torneo_cat_id = 1234
	 * $query->filterByTorneoCatId(array(12, 34)); // WHERE torneo_cat_id IN (12, 34)
	 * $query->filterByTorneoCatId(array('min' => 12)); // WHERE torneo_cat_id > 12
	 * </code>
	 *
	 * @see       filterByTorneoCategoria()
	 *
	 * @param     mixed $torneoCatId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterByTorneoCatId($torneoCatId = null, $comparison = null)
	{
		if (is_array($torneoCatId)) {
			$useMinMax = false;
			if (isset($torneoCatId['min'])) {
				$this->addUsingAlias(ResultadoTorneoPeer::TORNEO_CAT_ID, $torneoCatId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($torneoCatId['max'])) {
				$this->addUsingAlias(ResultadoTorneoPeer::TORNEO_CAT_ID, $torneoCatId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ResultadoTorneoPeer::TORNEO_CAT_ID, $torneoCatId, $comparison);
	}

	/**
	 * Filter the query on the pelotari_nro_doc column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPelotariNroDoc(1234); // WHERE pelotari_nro_doc = 1234
	 * $query->filterByPelotariNroDoc(array(12, 34)); // WHERE pelotari_nro_doc IN (12, 34)
	 * $query->filterByPelotariNroDoc(array('min' => 12)); // WHERE pelotari_nro_doc > 12
	 * </code>
	 *
	 * @see       filterByInscripto()
	 *
	 * @param     mixed $pelotariNroDoc The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterByPelotariNroDoc($pelotariNroDoc = null, $comparison = null)
	{
		if (is_array($pelotariNroDoc)) {
			$useMinMax = false;
			if (isset($pelotariNroDoc['min'])) {
				$this->addUsingAlias(ResultadoTorneoPeer::PELOTARI_NRO_DOC, $pelotariNroDoc['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pelotariNroDoc['max'])) {
				$this->addUsingAlias(ResultadoTorneoPeer::PELOTARI_NRO_DOC, $pelotariNroDoc['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ResultadoTorneoPeer::PELOTARI_NRO_DOC, $pelotariNroDoc, $comparison);
	}

	/**
	 * Filter the query by a related PuntosPuesto object
	 *
	 * @param     PuntosPuesto|PropelCollection $puntosPuesto The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterByPuntosPuesto($puntosPuesto, $comparison = null)
	{
		if ($puntosPuesto instanceof PuntosPuesto) {
			return $this
				->addUsingAlias(ResultadoTorneoPeer::PUESTO_ID, $puntosPuesto->getId(), $comparison);
		} elseif ($puntosPuesto instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ResultadoTorneoPeer::PUESTO_ID, $puntosPuesto->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPuntosPuesto() only accepts arguments of type PuntosPuesto or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PuntosPuesto relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function joinPuntosPuesto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PuntosPuesto');

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
			$this->addJoinObject($join, 'PuntosPuesto');
		}

		return $this;
	}

	/**
	 * Use the PuntosPuesto relation PuntosPuesto object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PuntosPuestoQuery A secondary query class using the current class as primary query
	 */
	public function usePuntosPuestoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPuntosPuesto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PuntosPuesto', 'PuntosPuestoQuery');
	}

	/**
	 * Filter the query by a related TorneoCategoria object
	 *
	 * @param     TorneoCategoria|PropelCollection $torneoCategoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterByTorneoCategoria($torneoCategoria, $comparison = null)
	{
		if ($torneoCategoria instanceof TorneoCategoria) {
			return $this
				->addUsingAlias(ResultadoTorneoPeer::TORNEO_CAT_ID, $torneoCategoria->getIdTorneoCategoria(), $comparison);
		} elseif ($torneoCategoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ResultadoTorneoPeer::TORNEO_CAT_ID, $torneoCategoria->toKeyValue('PrimaryKey', 'IdTorneoCategoria'), $comparison);
		} else {
			throw new PropelException('filterByTorneoCategoria() only accepts arguments of type TorneoCategoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TorneoCategoria relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function joinTorneoCategoria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TorneoCategoria');

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
			$this->addJoinObject($join, 'TorneoCategoria');
		}

		return $this;
	}

	/**
	 * Use the TorneoCategoria relation TorneoCategoria object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TorneoCategoriaQuery A secondary query class using the current class as primary query
	 */
	public function useTorneoCategoriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTorneoCategoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TorneoCategoria', 'TorneoCategoriaQuery');
	}

	/**
	 * Filter the query by a related Inscripto object
	 *
	 * @param     Inscripto|PropelCollection $inscripto The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function filterByInscripto($inscripto, $comparison = null)
	{
		if ($inscripto instanceof Inscripto) {
			return $this
				->addUsingAlias(ResultadoTorneoPeer::PELOTARI_NRO_DOC, $inscripto->getPersonaNroDoc(), $comparison);
		} elseif ($inscripto instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ResultadoTorneoPeer::PELOTARI_NRO_DOC, $inscripto->toKeyValue('PrimaryKey', 'PersonaNroDoc'), $comparison);
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
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
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
	 * @param     ResultadoTorneo $resultadoTorneo Object to remove from the list of results
	 *
	 * @return    ResultadoTorneoQuery The current query, for fluid interface
	 */
	public function prune($resultadoTorneo = null)
	{
		if ($resultadoTorneo) {
			$this->addUsingAlias(ResultadoTorneoPeer::ID, $resultadoTorneo->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseResultadoTorneoQuery