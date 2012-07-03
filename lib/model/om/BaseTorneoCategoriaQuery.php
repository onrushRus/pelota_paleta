<?php


/**
 * Base class that represents a query for the 'torneo_categoria' table.
 *
 * 
 *
 * @method     TorneoCategoriaQuery orderByIdTorneoCategoria($order = Criteria::ASC) Order by the id_torneo_categoria column
 * @method     TorneoCategoriaQuery orderByTorneoId($order = Criteria::ASC) Order by the torneo_id column
 * @method     TorneoCategoriaQuery orderByCategoriaId($order = Criteria::ASC) Order by the categoria_id column
 *
 * @method     TorneoCategoriaQuery groupByIdTorneoCategoria() Group by the id_torneo_categoria column
 * @method     TorneoCategoriaQuery groupByTorneoId() Group by the torneo_id column
 * @method     TorneoCategoriaQuery groupByCategoriaId() Group by the categoria_id column
 *
 * @method     TorneoCategoriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TorneoCategoriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TorneoCategoriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TorneoCategoriaQuery leftJoinTorneo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Torneo relation
 * @method     TorneoCategoriaQuery rightJoinTorneo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Torneo relation
 * @method     TorneoCategoriaQuery innerJoinTorneo($relationAlias = null) Adds a INNER JOIN clause to the query using the Torneo relation
 *
 * @method     TorneoCategoriaQuery leftJoinCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categoria relation
 * @method     TorneoCategoriaQuery rightJoinCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categoria relation
 * @method     TorneoCategoriaQuery innerJoinCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Categoria relation
 *
 * @method     TorneoCategoriaQuery leftJoinInscripto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripto relation
 * @method     TorneoCategoriaQuery rightJoinInscripto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripto relation
 * @method     TorneoCategoriaQuery innerJoinInscripto($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripto relation
 *
 * @method     TorneoCategoriaQuery leftJoinResultadoTorneo($relationAlias = null) Adds a LEFT JOIN clause to the query using the ResultadoTorneo relation
 * @method     TorneoCategoriaQuery rightJoinResultadoTorneo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ResultadoTorneo relation
 * @method     TorneoCategoriaQuery innerJoinResultadoTorneo($relationAlias = null) Adds a INNER JOIN clause to the query using the ResultadoTorneo relation
 *
 * @method     TorneoCategoria findOne(PropelPDO $con = null) Return the first TorneoCategoria matching the query
 * @method     TorneoCategoria findOneOrCreate(PropelPDO $con = null) Return the first TorneoCategoria matching the query, or a new TorneoCategoria object populated from the query conditions when no match is found
 *
 * @method     TorneoCategoria findOneByIdTorneoCategoria(int $id_torneo_categoria) Return the first TorneoCategoria filtered by the id_torneo_categoria column
 * @method     TorneoCategoria findOneByTorneoId(int $torneo_id) Return the first TorneoCategoria filtered by the torneo_id column
 * @method     TorneoCategoria findOneByCategoriaId(int $categoria_id) Return the first TorneoCategoria filtered by the categoria_id column
 *
 * @method     array findByIdTorneoCategoria(int $id_torneo_categoria) Return TorneoCategoria objects filtered by the id_torneo_categoria column
 * @method     array findByTorneoId(int $torneo_id) Return TorneoCategoria objects filtered by the torneo_id column
 * @method     array findByCategoriaId(int $categoria_id) Return TorneoCategoria objects filtered by the categoria_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTorneoCategoriaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTorneoCategoriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TorneoCategoria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TorneoCategoriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TorneoCategoriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TorneoCategoriaQuery) {
			return $criteria;
		}
		$query = new TorneoCategoriaQuery();
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
	 * @return    TorneoCategoria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TorneoCategoriaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TorneoCategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    TorneoCategoria A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_TORNEO_CATEGORIA`, `TORNEO_ID`, `CATEGORIA_ID` FROM `torneo_categoria` WHERE `ID_TORNEO_CATEGORIA` = :p0';
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
			$obj = new TorneoCategoria();
			$obj->hydrate($row);
			TorneoCategoriaPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    TorneoCategoria|array|mixed the result, formatted by the current formatter
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
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_torneo_categoria column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdTorneoCategoria(1234); // WHERE id_torneo_categoria = 1234
	 * $query->filterByIdTorneoCategoria(array(12, 34)); // WHERE id_torneo_categoria IN (12, 34)
	 * $query->filterByIdTorneoCategoria(array('min' => 12)); // WHERE id_torneo_categoria > 12
	 * </code>
	 *
	 * @param     mixed $idTorneoCategoria The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByIdTorneoCategoria($idTorneoCategoria = null, $comparison = null)
	{
		if (is_array($idTorneoCategoria) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA, $idTorneoCategoria, $comparison);
	}

	/**
	 * Filter the query on the torneo_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTorneoId(1234); // WHERE torneo_id = 1234
	 * $query->filterByTorneoId(array(12, 34)); // WHERE torneo_id IN (12, 34)
	 * $query->filterByTorneoId(array('min' => 12)); // WHERE torneo_id > 12
	 * </code>
	 *
	 * @see       filterByTorneo()
	 *
	 * @param     mixed $torneoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByTorneoId($torneoId = null, $comparison = null)
	{
		if (is_array($torneoId)) {
			$useMinMax = false;
			if (isset($torneoId['min'])) {
				$this->addUsingAlias(TorneoCategoriaPeer::TORNEO_ID, $torneoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($torneoId['max'])) {
				$this->addUsingAlias(TorneoCategoriaPeer::TORNEO_ID, $torneoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TorneoCategoriaPeer::TORNEO_ID, $torneoId, $comparison);
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
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByCategoriaId($categoriaId = null, $comparison = null)
	{
		if (is_array($categoriaId)) {
			$useMinMax = false;
			if (isset($categoriaId['min'])) {
				$this->addUsingAlias(TorneoCategoriaPeer::CATEGORIA_ID, $categoriaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoriaId['max'])) {
				$this->addUsingAlias(TorneoCategoriaPeer::CATEGORIA_ID, $categoriaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TorneoCategoriaPeer::CATEGORIA_ID, $categoriaId, $comparison);
	}

	/**
	 * Filter the query by a related Torneo object
	 *
	 * @param     Torneo|PropelCollection $torneo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByTorneo($torneo, $comparison = null)
	{
		if ($torneo instanceof Torneo) {
			return $this
				->addUsingAlias(TorneoCategoriaPeer::TORNEO_ID, $torneo->getId(), $comparison);
		} elseif ($torneo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(TorneoCategoriaPeer::TORNEO_ID, $torneo->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTorneo() only accepts arguments of type Torneo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Torneo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function joinTorneo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Torneo');

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
			$this->addJoinObject($join, 'Torneo');
		}

		return $this;
	}

	/**
	 * Use the Torneo relation Torneo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TorneoQuery A secondary query class using the current class as primary query
	 */
	public function useTorneoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTorneo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Torneo', 'TorneoQuery');
	}

	/**
	 * Filter the query by a related Categoria object
	 *
	 * @param     Categoria|PropelCollection $categoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByCategoria($categoria, $comparison = null)
	{
		if ($categoria instanceof Categoria) {
			return $this
				->addUsingAlias(TorneoCategoriaPeer::CATEGORIA_ID, $categoria->getId(), $comparison);
		} elseif ($categoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(TorneoCategoriaPeer::CATEGORIA_ID, $categoria->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
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
	 * Filter the query by a related Inscripto object
	 *
	 * @param     Inscripto $inscripto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByInscripto($inscripto, $comparison = null)
	{
		if ($inscripto instanceof Inscripto) {
			return $this
				->addUsingAlias(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA, $inscripto->getTorneoCatId(), $comparison);
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
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
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
	 * Filter the query by a related ResultadoTorneo object
	 *
	 * @param     ResultadoTorneo $resultadoTorneo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function filterByResultadoTorneo($resultadoTorneo, $comparison = null)
	{
		if ($resultadoTorneo instanceof ResultadoTorneo) {
			return $this
				->addUsingAlias(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA, $resultadoTorneo->getTorneoCatId(), $comparison);
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
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
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
	 * @param     TorneoCategoria $torneoCategoria Object to remove from the list of results
	 *
	 * @return    TorneoCategoriaQuery The current query, for fluid interface
	 */
	public function prune($torneoCategoria = null)
	{
		if ($torneoCategoria) {
			$this->addUsingAlias(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA, $torneoCategoria->getIdTorneoCategoria(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTorneoCategoriaQuery