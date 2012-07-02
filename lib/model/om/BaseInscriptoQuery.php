<?php


/**
 * Base class that represents a query for the 'inscripto' table.
 *
 * 
 *
 * @method     InscriptoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     InscriptoQuery orderByPersonaNroDoc($order = Criteria::ASC) Order by the persona_nro_doc column
 * @method     InscriptoQuery orderByTorneoCatId($order = Criteria::ASC) Order by the torneo_cat_id column
 * @method     InscriptoQuery orderByNroEquipo($order = Criteria::ASC) Order by the nro_equipo column
 * @method     InscriptoQuery orderByClubRepresentado($order = Criteria::ASC) Order by the club_representado column
 *
 * @method     InscriptoQuery groupById() Group by the id column
 * @method     InscriptoQuery groupByPersonaNroDoc() Group by the persona_nro_doc column
 * @method     InscriptoQuery groupByTorneoCatId() Group by the torneo_cat_id column
 * @method     InscriptoQuery groupByNroEquipo() Group by the nro_equipo column
 * @method     InscriptoQuery groupByClubRepresentado() Group by the club_representado column
 *
 * @method     InscriptoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     InscriptoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     InscriptoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     InscriptoQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     InscriptoQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     InscriptoQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     InscriptoQuery leftJoinTorneoCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the TorneoCategoria relation
 * @method     InscriptoQuery rightJoinTorneoCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TorneoCategoria relation
 * @method     InscriptoQuery innerJoinTorneoCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the TorneoCategoria relation
 *
 * @method     InscriptoQuery leftJoinClub($relationAlias = null) Adds a LEFT JOIN clause to the query using the Club relation
 * @method     InscriptoQuery rightJoinClub($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Club relation
 * @method     InscriptoQuery innerJoinClub($relationAlias = null) Adds a INNER JOIN clause to the query using the Club relation
 *
 * @method     InscriptoQuery leftJoinRanking($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ranking relation
 * @method     InscriptoQuery rightJoinRanking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ranking relation
 * @method     InscriptoQuery innerJoinRanking($relationAlias = null) Adds a INNER JOIN clause to the query using the Ranking relation
 *
 * @method     InscriptoQuery leftJoinResultadoTorneo($relationAlias = null) Adds a LEFT JOIN clause to the query using the ResultadoTorneo relation
 * @method     InscriptoQuery rightJoinResultadoTorneo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ResultadoTorneo relation
 * @method     InscriptoQuery innerJoinResultadoTorneo($relationAlias = null) Adds a INNER JOIN clause to the query using the ResultadoTorneo relation
 *
 * @method     Inscripto findOne(PropelPDO $con = null) Return the first Inscripto matching the query
 * @method     Inscripto findOneOrCreate(PropelPDO $con = null) Return the first Inscripto matching the query, or a new Inscripto object populated from the query conditions when no match is found
 *
 * @method     Inscripto findOneById(int $id) Return the first Inscripto filtered by the id column
 * @method     Inscripto findOneByPersonaNroDoc(int $persona_nro_doc) Return the first Inscripto filtered by the persona_nro_doc column
 * @method     Inscripto findOneByTorneoCatId(int $torneo_cat_id) Return the first Inscripto filtered by the torneo_cat_id column
 * @method     Inscripto findOneByNroEquipo(int $nro_equipo) Return the first Inscripto filtered by the nro_equipo column
 * @method     Inscripto findOneByClubRepresentado(int $club_representado) Return the first Inscripto filtered by the club_representado column
 *
 * @method     array findById(int $id) Return Inscripto objects filtered by the id column
 * @method     array findByPersonaNroDoc(int $persona_nro_doc) Return Inscripto objects filtered by the persona_nro_doc column
 * @method     array findByTorneoCatId(int $torneo_cat_id) Return Inscripto objects filtered by the torneo_cat_id column
 * @method     array findByNroEquipo(int $nro_equipo) Return Inscripto objects filtered by the nro_equipo column
 * @method     array findByClubRepresentado(int $club_representado) Return Inscripto objects filtered by the club_representado column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseInscriptoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseInscriptoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Inscripto', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new InscriptoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    InscriptoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof InscriptoQuery) {
			return $criteria;
		}
		$query = new InscriptoQuery();
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
	 * @return    Inscripto|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = InscriptoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(InscriptoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Inscripto A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PERSONA_NRO_DOC`, `TORNEO_CAT_ID`, `NRO_EQUIPO`, `CLUB_REPRESENTADO` FROM `inscripto` WHERE `ID` = :p0';
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
			$obj = new Inscripto();
			$obj->hydrate($row);
			InscriptoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Inscripto|array|mixed the result, formatted by the current formatter
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
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(InscriptoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(InscriptoPeer::ID, $keys, Criteria::IN);
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
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(InscriptoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the persona_nro_doc column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPersonaNroDoc(1234); // WHERE persona_nro_doc = 1234
	 * $query->filterByPersonaNroDoc(array(12, 34)); // WHERE persona_nro_doc IN (12, 34)
	 * $query->filterByPersonaNroDoc(array('min' => 12)); // WHERE persona_nro_doc > 12
	 * </code>
	 *
	 * @see       filterByPersona()
	 *
	 * @param     mixed $personaNroDoc The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByPersonaNroDoc($personaNroDoc = null, $comparison = null)
	{
		if (is_array($personaNroDoc)) {
			$useMinMax = false;
			if (isset($personaNroDoc['min'])) {
				$this->addUsingAlias(InscriptoPeer::PERSONA_NRO_DOC, $personaNroDoc['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($personaNroDoc['max'])) {
				$this->addUsingAlias(InscriptoPeer::PERSONA_NRO_DOC, $personaNroDoc['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InscriptoPeer::PERSONA_NRO_DOC, $personaNroDoc, $comparison);
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
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByTorneoCatId($torneoCatId = null, $comparison = null)
	{
		if (is_array($torneoCatId)) {
			$useMinMax = false;
			if (isset($torneoCatId['min'])) {
				$this->addUsingAlias(InscriptoPeer::TORNEO_CAT_ID, $torneoCatId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($torneoCatId['max'])) {
				$this->addUsingAlias(InscriptoPeer::TORNEO_CAT_ID, $torneoCatId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InscriptoPeer::TORNEO_CAT_ID, $torneoCatId, $comparison);
	}

	/**
	 * Filter the query on the nro_equipo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNroEquipo(1234); // WHERE nro_equipo = 1234
	 * $query->filterByNroEquipo(array(12, 34)); // WHERE nro_equipo IN (12, 34)
	 * $query->filterByNroEquipo(array('min' => 12)); // WHERE nro_equipo > 12
	 * </code>
	 *
	 * @param     mixed $nroEquipo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByNroEquipo($nroEquipo = null, $comparison = null)
	{
		if (is_array($nroEquipo)) {
			$useMinMax = false;
			if (isset($nroEquipo['min'])) {
				$this->addUsingAlias(InscriptoPeer::NRO_EQUIPO, $nroEquipo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($nroEquipo['max'])) {
				$this->addUsingAlias(InscriptoPeer::NRO_EQUIPO, $nroEquipo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InscriptoPeer::NRO_EQUIPO, $nroEquipo, $comparison);
	}

	/**
	 * Filter the query on the club_representado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClubRepresentado(1234); // WHERE club_representado = 1234
	 * $query->filterByClubRepresentado(array(12, 34)); // WHERE club_representado IN (12, 34)
	 * $query->filterByClubRepresentado(array('min' => 12)); // WHERE club_representado > 12
	 * </code>
	 *
	 * @see       filterByClub()
	 *
	 * @param     mixed $clubRepresentado The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByClubRepresentado($clubRepresentado = null, $comparison = null)
	{
		if (is_array($clubRepresentado)) {
			$useMinMax = false;
			if (isset($clubRepresentado['min'])) {
				$this->addUsingAlias(InscriptoPeer::CLUB_REPRESENTADO, $clubRepresentado['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clubRepresentado['max'])) {
				$this->addUsingAlias(InscriptoPeer::CLUB_REPRESENTADO, $clubRepresentado['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InscriptoPeer::CLUB_REPRESENTADO, $clubRepresentado, $comparison);
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona|PropelCollection $persona The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		if ($persona instanceof Persona) {
			return $this
				->addUsingAlias(InscriptoPeer::PERSONA_NRO_DOC, $persona->getNroDoc(), $comparison);
		} elseif ($persona instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(InscriptoPeer::PERSONA_NRO_DOC, $persona->toKeyValue('PrimaryKey', 'NroDoc'), $comparison);
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
	 * @return    InscriptoQuery The current query, for fluid interface
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
	 * Filter the query by a related TorneoCategoria object
	 *
	 * @param     TorneoCategoria|PropelCollection $torneoCategoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByTorneoCategoria($torneoCategoria, $comparison = null)
	{
		if ($torneoCategoria instanceof TorneoCategoria) {
			return $this
				->addUsingAlias(InscriptoPeer::TORNEO_CAT_ID, $torneoCategoria->getIdTorneoCategoria(), $comparison);
		} elseif ($torneoCategoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(InscriptoPeer::TORNEO_CAT_ID, $torneoCategoria->toKeyValue('PrimaryKey', 'IdTorneoCategoria'), $comparison);
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
	 * @return    InscriptoQuery The current query, for fluid interface
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
	 * Filter the query by a related Club object
	 *
	 * @param     Club|PropelCollection $club The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByClub($club, $comparison = null)
	{
		if ($club instanceof Club) {
			return $this
				->addUsingAlias(InscriptoPeer::CLUB_REPRESENTADO, $club->getId(), $comparison);
		} elseif ($club instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(InscriptoPeer::CLUB_REPRESENTADO, $club->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByClub() only accepts arguments of type Club or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Club relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function joinClub($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Club');

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
			$this->addJoinObject($join, 'Club');
		}

		return $this;
	}

	/**
	 * Use the Club relation Club object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClubQuery A secondary query class using the current class as primary query
	 */
	public function useClubQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClub($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Club', 'ClubQuery');
	}

	/**
	 * Filter the query by a related Ranking object
	 *
	 * @param     Ranking $ranking  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByRanking($ranking, $comparison = null)
	{
		if ($ranking instanceof Ranking) {
			return $this
				->addUsingAlias(InscriptoPeer::PERSONA_NRO_DOC, $ranking->getPelotariNroDoc(), $comparison);
		} elseif ($ranking instanceof PropelCollection) {
			return $this
				->useRankingQuery()
				->filterByPrimaryKeys($ranking->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByRanking() only accepts arguments of type Ranking or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Ranking relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function joinRanking($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Ranking');

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
			$this->addJoinObject($join, 'Ranking');
		}

		return $this;
	}

	/**
	 * Use the Ranking relation Ranking object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RankingQuery A secondary query class using the current class as primary query
	 */
	public function useRankingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRanking($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Ranking', 'RankingQuery');
	}

	/**
	 * Filter the query by a related ResultadoTorneo object
	 *
	 * @param     ResultadoTorneo $resultadoTorneo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function filterByResultadoTorneo($resultadoTorneo, $comparison = null)
	{
		if ($resultadoTorneo instanceof ResultadoTorneo) {
			return $this
				->addUsingAlias(InscriptoPeer::PERSONA_NRO_DOC, $resultadoTorneo->getPelotariNroDoc(), $comparison);
		} elseif ($resultadoTorneo instanceof PropelCollection) {
			return $this
				->useResultadoTorneoQuery()
				->filterByPrimaryKeys($resultadoTorneo->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByResultadoTorneo() only accepts arguments of type ResultadoTorneo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ResultadoTorneo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function joinResultadoTorneo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ResultadoTorneo');

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
			$this->addJoinObject($join, 'ResultadoTorneo');
		}

		return $this;
	}

	/**
	 * Use the ResultadoTorneo relation ResultadoTorneo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ResultadoTorneoQuery A secondary query class using the current class as primary query
	 */
	public function useResultadoTorneoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinResultadoTorneo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ResultadoTorneo', 'ResultadoTorneoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Inscripto $inscripto Object to remove from the list of results
	 *
	 * @return    InscriptoQuery The current query, for fluid interface
	 */
	public function prune($inscripto = null)
	{
		if ($inscripto) {
			$this->addUsingAlias(InscriptoPeer::ID, $inscripto->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseInscriptoQuery