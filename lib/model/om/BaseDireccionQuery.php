<?php


/**
 * Base class that represents a query for the 'direccion' table.
 *
 * 
 *
 * @method     DireccionQuery orderByPersonaNroDoc($order = Criteria::ASC) Order by the persona_nro_doc column
 * @method     DireccionQuery orderByCalle($order = Criteria::ASC) Order by the calle column
 * @method     DireccionQuery orderByNumero($order = Criteria::ASC) Order by the numero column
 * @method     DireccionQuery orderByMonoblockEdif($order = Criteria::ASC) Order by the monoblock_edif column
 * @method     DireccionQuery orderByPiso($order = Criteria::ASC) Order by the piso column
 * @method     DireccionQuery orderByDpto($order = Criteria::ASC) Order by the dpto column
 *
 * @method     DireccionQuery groupByPersonaNroDoc() Group by the persona_nro_doc column
 * @method     DireccionQuery groupByCalle() Group by the calle column
 * @method     DireccionQuery groupByNumero() Group by the numero column
 * @method     DireccionQuery groupByMonoblockEdif() Group by the monoblock_edif column
 * @method     DireccionQuery groupByPiso() Group by the piso column
 * @method     DireccionQuery groupByDpto() Group by the dpto column
 *
 * @method     DireccionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DireccionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DireccionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DireccionQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     DireccionQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     DireccionQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     Direccion findOne(PropelPDO $con = null) Return the first Direccion matching the query
 * @method     Direccion findOneOrCreate(PropelPDO $con = null) Return the first Direccion matching the query, or a new Direccion object populated from the query conditions when no match is found
 *
 * @method     Direccion findOneByPersonaNroDoc(int $persona_nro_doc) Return the first Direccion filtered by the persona_nro_doc column
 * @method     Direccion findOneByCalle(string $calle) Return the first Direccion filtered by the calle column
 * @method     Direccion findOneByNumero(int $numero) Return the first Direccion filtered by the numero column
 * @method     Direccion findOneByMonoblockEdif(string $monoblock_edif) Return the first Direccion filtered by the monoblock_edif column
 * @method     Direccion findOneByPiso(string $piso) Return the first Direccion filtered by the piso column
 * @method     Direccion findOneByDpto(string $dpto) Return the first Direccion filtered by the dpto column
 *
 * @method     array findByPersonaNroDoc(int $persona_nro_doc) Return Direccion objects filtered by the persona_nro_doc column
 * @method     array findByCalle(string $calle) Return Direccion objects filtered by the calle column
 * @method     array findByNumero(int $numero) Return Direccion objects filtered by the numero column
 * @method     array findByMonoblockEdif(string $monoblock_edif) Return Direccion objects filtered by the monoblock_edif column
 * @method     array findByPiso(string $piso) Return Direccion objects filtered by the piso column
 * @method     array findByDpto(string $dpto) Return Direccion objects filtered by the dpto column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDireccionQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseDireccionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Direccion', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DireccionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DireccionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DireccionQuery) {
			return $criteria;
		}
		$query = new DireccionQuery();
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
	 * @param     array[$persona_nro_doc, $calle, $numero] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Direccion|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = DireccionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(DireccionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Direccion A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `PERSONA_NRO_DOC`, `CALLE`, `NUMERO`, `MONOBLOCK_EDIF`, `PISO`, `DPTO` FROM `direccion` WHERE `PERSONA_NRO_DOC` = :p0 AND `CALLE` = :p1 AND `NUMERO` = :p2';
		try {
			$stmt = $con->prepare($sql);			
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);			
			$stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Direccion();
			$obj->hydrate($row);
			DireccionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
	 * @return    Direccion|array|mixed the result, formatted by the current formatter
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
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(DireccionPeer::PERSONA_NRO_DOC, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(DireccionPeer::CALLE, $key[1], Criteria::EQUAL);
		$this->addUsingAlias(DireccionPeer::NUMERO, $key[2], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(DireccionPeer::PERSONA_NRO_DOC, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(DireccionPeer::CALLE, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$cton2 = $this->getNewCriterion(DireccionPeer::NUMERO, $key[2], Criteria::EQUAL);
			$cton0->addAnd($cton2);
			$this->addOr($cton0);
		}

		return $this;
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
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByPersonaNroDoc($personaNroDoc = null, $comparison = null)
	{
		if (is_array($personaNroDoc) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DireccionPeer::PERSONA_NRO_DOC, $personaNroDoc, $comparison);
	}

	/**
	 * Filter the query on the calle column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCalle('fooValue');   // WHERE calle = 'fooValue'
	 * $query->filterByCalle('%fooValue%'); // WHERE calle LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $calle The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByCalle($calle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($calle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $calle)) {
				$calle = str_replace('*', '%', $calle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DireccionPeer::CALLE, $calle, $comparison);
	}

	/**
	 * Filter the query on the numero column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumero(1234); // WHERE numero = 1234
	 * $query->filterByNumero(array(12, 34)); // WHERE numero IN (12, 34)
	 * $query->filterByNumero(array('min' => 12)); // WHERE numero > 12
	 * </code>
	 *
	 * @param     mixed $numero The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByNumero($numero = null, $comparison = null)
	{
		if (is_array($numero) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DireccionPeer::NUMERO, $numero, $comparison);
	}

	/**
	 * Filter the query on the monoblock_edif column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMonoblockEdif('fooValue');   // WHERE monoblock_edif = 'fooValue'
	 * $query->filterByMonoblockEdif('%fooValue%'); // WHERE monoblock_edif LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $monoblockEdif The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByMonoblockEdif($monoblockEdif = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($monoblockEdif)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $monoblockEdif)) {
				$monoblockEdif = str_replace('*', '%', $monoblockEdif);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DireccionPeer::MONOBLOCK_EDIF, $monoblockEdif, $comparison);
	}

	/**
	 * Filter the query on the piso column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPiso('fooValue');   // WHERE piso = 'fooValue'
	 * $query->filterByPiso('%fooValue%'); // WHERE piso LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $piso The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByPiso($piso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($piso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $piso)) {
				$piso = str_replace('*', '%', $piso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DireccionPeer::PISO, $piso, $comparison);
	}

	/**
	 * Filter the query on the dpto column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDpto('fooValue');   // WHERE dpto = 'fooValue'
	 * $query->filterByDpto('%fooValue%'); // WHERE dpto LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $dpto The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByDpto($dpto = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dpto)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dpto)) {
				$dpto = str_replace('*', '%', $dpto);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DireccionPeer::DPTO, $dpto, $comparison);
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona|PropelCollection $persona The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		if ($persona instanceof Persona) {
			return $this
				->addUsingAlias(DireccionPeer::PERSONA_NRO_DOC, $persona->getNroDoc(), $comparison);
		} elseif ($persona instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(DireccionPeer::PERSONA_NRO_DOC, $persona->toKeyValue('PrimaryKey', 'NroDoc'), $comparison);
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
	 * @return    DireccionQuery The current query, for fluid interface
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
	 * @param     Direccion $direccion Object to remove from the list of results
	 *
	 * @return    DireccionQuery The current query, for fluid interface
	 */
	public function prune($direccion = null)
	{
		if ($direccion) {
			$this->addCond('pruneCond0', $this->getAliasedColName(DireccionPeer::PERSONA_NRO_DOC), $direccion->getPersonaNroDoc(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(DireccionPeer::CALLE), $direccion->getCalle(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond2', $this->getAliasedColName(DireccionPeer::NUMERO), $direccion->getNumero(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseDireccionQuery