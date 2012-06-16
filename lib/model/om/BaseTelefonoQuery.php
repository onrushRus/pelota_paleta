<?php


/**
 * Base class that represents a query for the 'telefono' table.
 *
 * 
 *
 * @method     TelefonoQuery orderByPersonaNroDoc($order = Criteria::ASC) Order by the persona_nro_doc column
 * @method     TelefonoQuery orderByTelefonoNro($order = Criteria::ASC) Order by the telefono_nro column
 *
 * @method     TelefonoQuery groupByPersonaNroDoc() Group by the persona_nro_doc column
 * @method     TelefonoQuery groupByTelefonoNro() Group by the telefono_nro column
 *
 * @method     TelefonoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TelefonoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TelefonoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TelefonoQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     TelefonoQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     TelefonoQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     Telefono findOne(PropelPDO $con = null) Return the first Telefono matching the query
 * @method     Telefono findOneOrCreate(PropelPDO $con = null) Return the first Telefono matching the query, or a new Telefono object populated from the query conditions when no match is found
 *
 * @method     Telefono findOneByPersonaNroDoc(int $persona_nro_doc) Return the first Telefono filtered by the persona_nro_doc column
 * @method     Telefono findOneByTelefonoNro(string $telefono_nro) Return the first Telefono filtered by the telefono_nro column
 *
 * @method     array findByPersonaNroDoc(int $persona_nro_doc) Return Telefono objects filtered by the persona_nro_doc column
 * @method     array findByTelefonoNro(string $telefono_nro) Return Telefono objects filtered by the telefono_nro column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTelefonoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTelefonoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Telefono', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TelefonoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TelefonoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TelefonoQuery) {
			return $criteria;
		}
		$query = new TelefonoQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$persona_nro_doc, $telefono_nro] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Telefono|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TelefonoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TelefonoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Telefono A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `PERSONA_NRO_DOC`, `TELEFONO_NRO` FROM `telefono` WHERE `PERSONA_NRO_DOC` = :p0 AND `TELEFONO_NRO` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Telefono();
			$obj->hydrate($row);
			TelefonoPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
	 * @return    Telefono|array|mixed the result, formatted by the current formatter
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
	 * @return    TelefonoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(TelefonoPeer::PERSONA_NRO_DOC, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(TelefonoPeer::TELEFONO_NRO, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TelefonoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(TelefonoPeer::PERSONA_NRO_DOC, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(TelefonoPeer::TELEFONO_NRO, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
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
	 * @return    TelefonoQuery The current query, for fluid interface
	 */
	public function filterByPersonaNroDoc($personaNroDoc = null, $comparison = null)
	{
		if (is_array($personaNroDoc) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TelefonoPeer::PERSONA_NRO_DOC, $personaNroDoc, $comparison);
	}

	/**
	 * Filter the query on the telefono_nro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTelefonoNro('fooValue');   // WHERE telefono_nro = 'fooValue'
	 * $query->filterByTelefonoNro('%fooValue%'); // WHERE telefono_nro LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telefonoNro The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TelefonoQuery The current query, for fluid interface
	 */
	public function filterByTelefonoNro($telefonoNro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefonoNro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefonoNro)) {
				$telefonoNro = str_replace('*', '%', $telefonoNro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TelefonoPeer::TELEFONO_NRO, $telefonoNro, $comparison);
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona|PropelCollection $persona The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TelefonoQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		if ($persona instanceof Persona) {
			return $this
				->addUsingAlias(TelefonoPeer::PERSONA_NRO_DOC, $persona->getNroDoc(), $comparison);
		} elseif ($persona instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(TelefonoPeer::PERSONA_NRO_DOC, $persona->toKeyValue('PrimaryKey', 'NroDoc'), $comparison);
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
	 * @return    TelefonoQuery The current query, for fluid interface
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
	 * @param     Telefono $telefono Object to remove from the list of results
	 *
	 * @return    TelefonoQuery The current query, for fluid interface
	 */
	public function prune($telefono = null)
	{
		if ($telefono) {
			$this->addCond('pruneCond0', $this->getAliasedColName(TelefonoPeer::PERSONA_NRO_DOC), $telefono->getPersonaNroDoc(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(TelefonoPeer::TELEFONO_NRO), $telefono->getTelefonoNro(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseTelefonoQuery