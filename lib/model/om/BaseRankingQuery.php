<?php


/**
 * Base class that represents a query for the 'ranking' table.
 *
 * 
 *
 * @method     RankingQuery orderByPelotariNroDoc($order = Criteria::ASC) Order by the pelotari_nro_doc column
 * @method     RankingQuery orderByTipoRanking($order = Criteria::ASC) Order by the tipo_ranking column
 * @method     RankingQuery orderByCategoriaId($order = Criteria::ASC) Order by the categoria_id column
 * @method     RankingQuery orderByPelotariPuntos($order = Criteria::ASC) Order by the pelotari_puntos column
 *
 * @method     RankingQuery groupByPelotariNroDoc() Group by the pelotari_nro_doc column
 * @method     RankingQuery groupByTipoRanking() Group by the tipo_ranking column
 * @method     RankingQuery groupByCategoriaId() Group by the categoria_id column
 * @method     RankingQuery groupByPelotariPuntos() Group by the pelotari_puntos column
 *
 * @method     RankingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RankingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RankingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RankingQuery leftJoinInscripto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripto relation
 * @method     RankingQuery rightJoinInscripto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripto relation
 * @method     RankingQuery innerJoinInscripto($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripto relation
 *
 * @method     RankingQuery leftJoinCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categoria relation
 * @method     RankingQuery rightJoinCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categoria relation
 * @method     RankingQuery innerJoinCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Categoria relation
 *
 * @method     Ranking findOne(PropelPDO $con = null) Return the first Ranking matching the query
 * @method     Ranking findOneOrCreate(PropelPDO $con = null) Return the first Ranking matching the query, or a new Ranking object populated from the query conditions when no match is found
 *
 * @method     Ranking findOneByPelotariNroDoc(int $pelotari_nro_doc) Return the first Ranking filtered by the pelotari_nro_doc column
 * @method     Ranking findOneByTipoRanking(boolean $tipo_ranking) Return the first Ranking filtered by the tipo_ranking column
 * @method     Ranking findOneByCategoriaId(int $categoria_id) Return the first Ranking filtered by the categoria_id column
 * @method     Ranking findOneByPelotariPuntos(int $pelotari_puntos) Return the first Ranking filtered by the pelotari_puntos column
 *
 * @method     array findByPelotariNroDoc(int $pelotari_nro_doc) Return Ranking objects filtered by the pelotari_nro_doc column
 * @method     array findByTipoRanking(boolean $tipo_ranking) Return Ranking objects filtered by the tipo_ranking column
 * @method     array findByCategoriaId(int $categoria_id) Return Ranking objects filtered by the categoria_id column
 * @method     array findByPelotariPuntos(int $pelotari_puntos) Return Ranking objects filtered by the pelotari_puntos column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRankingQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRankingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Ranking', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RankingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RankingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RankingQuery) {
			return $criteria;
		}
		$query = new RankingQuery();
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
	 * $obj = $c->findPk(array(12, 34, 56), $con);
	 * </code>
	 *
	 * @param     array[$pelotari_nro_doc, $tipo_ranking, $categoria_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Ranking|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RankingPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RankingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Ranking A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `PELOTARI_NRO_DOC`, `TIPO_RANKING`, `CATEGORIA_ID`, `PELOTARI_PUNTOS` FROM `ranking` WHERE `PELOTARI_NRO_DOC` = :p0 AND `TIPO_RANKING` = :p1 AND `CATEGORIA_ID` = :p2';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', (int) $key[1], PDO::PARAM_INT);
			$stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Ranking();
			$obj->hydrate($row);
			RankingPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
	 * @return    Ranking|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(RankingPeer::PELOTARI_NRO_DOC, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(RankingPeer::TIPO_RANKING, $key[1], Criteria::EQUAL);
		$this->addUsingAlias(RankingPeer::CATEGORIA_ID, $key[2], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(RankingPeer::PELOTARI_NRO_DOC, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(RankingPeer::TIPO_RANKING, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$cton2 = $this->getNewCriterion(RankingPeer::CATEGORIA_ID, $key[2], Criteria::EQUAL);
			$cton0->addAnd($cton2);
			$this->addOr($cton0);
		}

		return $this;
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
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function filterByPelotariNroDoc($pelotariNroDoc = null, $comparison = null)
	{
		if (is_array($pelotariNroDoc) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RankingPeer::PELOTARI_NRO_DOC, $pelotariNroDoc, $comparison);
	}

	/**
	 * Filter the query on the tipo_ranking column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoRanking(true); // WHERE tipo_ranking = true
	 * $query->filterByTipoRanking('yes'); // WHERE tipo_ranking = true
	 * </code>
	 *
	 * @param     boolean|string $tipoRanking The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function filterByTipoRanking($tipoRanking = null, $comparison = null)
	{
		if (is_string($tipoRanking)) {
			$tipo_ranking = in_array(strtolower($tipoRanking), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(RankingPeer::TIPO_RANKING, $tipoRanking, $comparison);
	}

	/**
	 * Filter the query on the categoria_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategoriaId(1234); // WHERE categoria_id = 1234
	 * $query->filterByCategoriaId(array(12, 34)); // WHERE categoria_id IN (12, 34)
	 * $query->filterByCategoriaId(array('min' => 12)); // WHERE categoria_id > 12
	 * </code>
	 *
	 * @see       filterByCategoria()
	 *
	 * @param     mixed $categoriaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function filterByCategoriaId($categoriaId = null, $comparison = null)
	{
		if (is_array($categoriaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RankingPeer::CATEGORIA_ID, $categoriaId, $comparison);
	}

	/**
	 * Filter the query on the pelotari_puntos column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPelotariPuntos(1234); // WHERE pelotari_puntos = 1234
	 * $query->filterByPelotariPuntos(array(12, 34)); // WHERE pelotari_puntos IN (12, 34)
	 * $query->filterByPelotariPuntos(array('min' => 12)); // WHERE pelotari_puntos > 12
	 * </code>
	 *
	 * @param     mixed $pelotariPuntos The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function filterByPelotariPuntos($pelotariPuntos = null, $comparison = null)
	{
		if (is_array($pelotariPuntos)) {
			$useMinMax = false;
			if (isset($pelotariPuntos['min'])) {
				$this->addUsingAlias(RankingPeer::PELOTARI_PUNTOS, $pelotariPuntos['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pelotariPuntos['max'])) {
				$this->addUsingAlias(RankingPeer::PELOTARI_PUNTOS, $pelotariPuntos['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RankingPeer::PELOTARI_PUNTOS, $pelotariPuntos, $comparison);
	}

	/**
	 * Filter the query by a related Inscripto object
	 *
	 * @param     Inscripto|PropelCollection $inscripto The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function filterByInscripto($inscripto, $comparison = null)
	{
		if ($inscripto instanceof Inscripto) {
			return $this
				->addUsingAlias(RankingPeer::PELOTARI_NRO_DOC, $inscripto->getPersonaNroDoc(), $comparison);
		} elseif ($inscripto instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RankingPeer::PELOTARI_NRO_DOC, $inscripto->toKeyValue('PrimaryKey', 'PersonaNroDoc'), $comparison);
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
	 * @return    RankingQuery The current query, for fluid interface
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
	 * Filter the query by a related Categoria object
	 *
	 * @param     Categoria|PropelCollection $categoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function filterByCategoria($categoria, $comparison = null)
	{
		if ($categoria instanceof Categoria) {
			return $this
				->addUsingAlias(RankingPeer::CATEGORIA_ID, $categoria->getId(), $comparison);
		} elseif ($categoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RankingPeer::CATEGORIA_ID, $categoria->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCategoria() only accepts arguments of type Categoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Categoria relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function joinCategoria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Categoria');

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
			$this->addJoinObject($join, 'Categoria');
		}

		return $this;
	}

	/**
	 * Use the Categoria relation Categoria object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery A secondary query class using the current class as primary query
	 */
	public function useCategoriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCategoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Categoria', 'CategoriaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Ranking $ranking Object to remove from the list of results
	 *
	 * @return    RankingQuery The current query, for fluid interface
	 */
	public function prune($ranking = null)
	{
		if ($ranking) {
			$this->addCond('pruneCond0', $this->getAliasedColName(RankingPeer::PELOTARI_NRO_DOC), $ranking->getPelotariNroDoc(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(RankingPeer::TIPO_RANKING), $ranking->getTipoRanking(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond2', $this->getAliasedColName(RankingPeer::CATEGORIA_ID), $ranking->getCategoriaId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseRankingQuery