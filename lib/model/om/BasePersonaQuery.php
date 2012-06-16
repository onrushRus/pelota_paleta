<?php


/**
 * Base class that represents a query for the 'persona' table.
 *
 * 
 *
 * @method     PersonaQuery orderByNroDoc($order = Criteria::ASC) Order by the nro_doc column
 * @method     PersonaQuery orderByNomApellido($order = Criteria::ASC) Order by the nom_apellido column
 * @method     PersonaQuery orderByFechaNacimiento($order = Criteria::ASC) Order by the fecha_nacimiento column
 * @method     PersonaQuery orderByEMail($order = Criteria::ASC) Order by the e_mail column
 * @method     PersonaQuery orderByLocalidadId($order = Criteria::ASC) Order by the localidad_id column
 *
 * @method     PersonaQuery groupByNroDoc() Group by the nro_doc column
 * @method     PersonaQuery groupByNomApellido() Group by the nom_apellido column
 * @method     PersonaQuery groupByFechaNacimiento() Group by the fecha_nacimiento column
 * @method     PersonaQuery groupByEMail() Group by the e_mail column
 * @method     PersonaQuery groupByLocalidadId() Group by the localidad_id column
 *
 * @method     PersonaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PersonaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PersonaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PersonaQuery leftJoinLocalidad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Localidad relation
 * @method     PersonaQuery rightJoinLocalidad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Localidad relation
 * @method     PersonaQuery innerJoinLocalidad($relationAlias = null) Adds a INNER JOIN clause to the query using the Localidad relation
 *
 * @method     PersonaQuery leftJoinDireccion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Direccion relation
 * @method     PersonaQuery rightJoinDireccion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Direccion relation
 * @method     PersonaQuery innerJoinDireccion($relationAlias = null) Adds a INNER JOIN clause to the query using the Direccion relation
 *
 * @method     PersonaQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     PersonaQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     PersonaQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     PersonaQuery leftJoinTelefono($relationAlias = null) Adds a LEFT JOIN clause to the query using the Telefono relation
 * @method     PersonaQuery rightJoinTelefono($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Telefono relation
 * @method     PersonaQuery innerJoinTelefono($relationAlias = null) Adds a INNER JOIN clause to the query using the Telefono relation
 *
 * @method     Persona findOne(PropelPDO $con = null) Return the first Persona matching the query
 * @method     Persona findOneOrCreate(PropelPDO $con = null) Return the first Persona matching the query, or a new Persona object populated from the query conditions when no match is found
 *
 * @method     Persona findOneByNroDoc(int $nro_doc) Return the first Persona filtered by the nro_doc column
 * @method     Persona findOneByNomApellido(string $nom_apellido) Return the first Persona filtered by the nom_apellido column
 * @method     Persona findOneByFechaNacimiento(string $fecha_nacimiento) Return the first Persona filtered by the fecha_nacimiento column
 * @method     Persona findOneByEMail(string $e_mail) Return the first Persona filtered by the e_mail column
 * @method     Persona findOneByLocalidadId(int $localidad_id) Return the first Persona filtered by the localidad_id column
 *
 * @method     array findByNroDoc(int $nro_doc) Return Persona objects filtered by the nro_doc column
 * @method     array findByNomApellido(string $nom_apellido) Return Persona objects filtered by the nom_apellido column
 * @method     array findByFechaNacimiento(string $fecha_nacimiento) Return Persona objects filtered by the fecha_nacimiento column
 * @method     array findByEMail(string $e_mail) Return Persona objects filtered by the e_mail column
 * @method     array findByLocalidadId(int $localidad_id) Return Persona objects filtered by the localidad_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePersonaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePersonaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Persona', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PersonaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PersonaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PersonaQuery) {
			return $criteria;
		}
		$query = new PersonaQuery();
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
	 * @return    Persona|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PersonaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PersonaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Persona A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `NRO_DOC`, `NOM_APELLIDO`, `FECHA_NACIMIENTO`, `E_MAIL`, `LOCALIDAD_ID` FROM `persona` WHERE `NRO_DOC` = :p0';
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
			$obj = new Persona();
			$obj->hydrate($row);
			PersonaPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Persona|array|mixed the result, formatted by the current formatter
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
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PersonaPeer::NRO_DOC, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PersonaPeer::NRO_DOC, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the nro_doc column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNroDoc(1234); // WHERE nro_doc = 1234
	 * $query->filterByNroDoc(array(12, 34)); // WHERE nro_doc IN (12, 34)
	 * $query->filterByNroDoc(array('min' => 12)); // WHERE nro_doc > 12
	 * </code>
	 *
	 * @param     mixed $nroDoc The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByNroDoc($nroDoc = null, $comparison = null)
	{
		if (is_array($nroDoc) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PersonaPeer::NRO_DOC, $nroDoc, $comparison);
	}

	/**
	 * Filter the query on the nom_apellido column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomApellido('fooValue');   // WHERE nom_apellido = 'fooValue'
	 * $query->filterByNomApellido('%fooValue%'); // WHERE nom_apellido LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomApellido The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByNomApellido($nomApellido = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomApellido)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomApellido)) {
				$nomApellido = str_replace('*', '%', $nomApellido);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PersonaPeer::NOM_APELLIDO, $nomApellido, $comparison);
	}

	/**
	 * Filter the query on the fecha_nacimiento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechaNacimiento('2011-03-14'); // WHERE fecha_nacimiento = '2011-03-14'
	 * $query->filterByFechaNacimiento('now'); // WHERE fecha_nacimiento = '2011-03-14'
	 * $query->filterByFechaNacimiento(array('max' => 'yesterday')); // WHERE fecha_nacimiento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechaNacimiento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByFechaNacimiento($fechaNacimiento = null, $comparison = null)
	{
		if (is_array($fechaNacimiento)) {
			$useMinMax = false;
			if (isset($fechaNacimiento['min'])) {
				$this->addUsingAlias(PersonaPeer::FECHA_NACIMIENTO, $fechaNacimiento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaNacimiento['max'])) {
				$this->addUsingAlias(PersonaPeer::FECHA_NACIMIENTO, $fechaNacimiento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaPeer::FECHA_NACIMIENTO, $fechaNacimiento, $comparison);
	}

	/**
	 * Filter the query on the e_mail column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEMail('fooValue');   // WHERE e_mail = 'fooValue'
	 * $query->filterByEMail('%fooValue%'); // WHERE e_mail LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $eMail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByEMail($eMail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($eMail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $eMail)) {
				$eMail = str_replace('*', '%', $eMail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PersonaPeer::E_MAIL, $eMail, $comparison);
	}

	/**
	 * Filter the query on the localidad_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocalidadId(1234); // WHERE localidad_id = 1234
	 * $query->filterByLocalidadId(array(12, 34)); // WHERE localidad_id IN (12, 34)
	 * $query->filterByLocalidadId(array('min' => 12)); // WHERE localidad_id > 12
	 * </code>
	 *
	 * @see       filterByLocalidad()
	 *
	 * @param     mixed $localidadId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByLocalidadId($localidadId = null, $comparison = null)
	{
		if (is_array($localidadId)) {
			$useMinMax = false;
			if (isset($localidadId['min'])) {
				$this->addUsingAlias(PersonaPeer::LOCALIDAD_ID, $localidadId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($localidadId['max'])) {
				$this->addUsingAlias(PersonaPeer::LOCALIDAD_ID, $localidadId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaPeer::LOCALIDAD_ID, $localidadId, $comparison);
	}

	/**
	 * Filter the query by a related Localidad object
	 *
	 * @param     Localidad|PropelCollection $localidad The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByLocalidad($localidad, $comparison = null)
	{
		if ($localidad instanceof Localidad) {
			return $this
				->addUsingAlias(PersonaPeer::LOCALIDAD_ID, $localidad->getId(), $comparison);
		} elseif ($localidad instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PersonaPeer::LOCALIDAD_ID, $localidad->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PersonaQuery The current query, for fluid interface
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
	 * Filter the query by a related Direccion object
	 *
	 * @param     Direccion $direccion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByDireccion($direccion, $comparison = null)
	{
		if ($direccion instanceof Direccion) {
			return $this
				->addUsingAlias(PersonaPeer::NRO_DOC, $direccion->getPersonaNroDoc(), $comparison);
		} elseif ($direccion instanceof PropelCollection) {
			return $this
				->useDireccionQuery()
				->filterByPrimaryKeys($direccion->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByDireccion() only accepts arguments of type Direccion or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Direccion relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function joinDireccion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Direccion');

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
			$this->addJoinObject($join, 'Direccion');
		}

		return $this;
	}

	/**
	 * Use the Direccion relation Direccion object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DireccionQuery A secondary query class using the current class as primary query
	 */
	public function useDireccionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDireccion($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Direccion', 'DireccionQuery');
	}

	/**
	 * Filter the query by a related Socio object
	 *
	 * @param     Socio $socio  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterBySocio($socio, $comparison = null)
	{
		if ($socio instanceof Socio) {
			return $this
				->addUsingAlias(PersonaPeer::NRO_DOC, $socio->getPersonaNroDoc(), $comparison);
		} elseif ($socio instanceof PropelCollection) {
			return $this
				->useSocioQuery()
				->filterByPrimaryKeys($socio->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySocio() only accepts arguments of type Socio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Socio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function joinSocio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Socio');

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
			$this->addJoinObject($join, 'Socio');
		}

		return $this;
	}

	/**
	 * Use the Socio relation Socio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SocioQuery A secondary query class using the current class as primary query
	 */
	public function useSocioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSocio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Socio', 'SocioQuery');
	}

	/**
	 * Filter the query by a related Telefono object
	 *
	 * @param     Telefono $telefono  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function filterByTelefono($telefono, $comparison = null)
	{
		if ($telefono instanceof Telefono) {
			return $this
				->addUsingAlias(PersonaPeer::NRO_DOC, $telefono->getPersonaNroDoc(), $comparison);
		} elseif ($telefono instanceof PropelCollection) {
			return $this
				->useTelefonoQuery()
				->filterByPrimaryKeys($telefono->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByTelefono() only accepts arguments of type Telefono or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Telefono relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function joinTelefono($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Telefono');

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
			$this->addJoinObject($join, 'Telefono');
		}

		return $this;
	}

	/**
	 * Use the Telefono relation Telefono object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TelefonoQuery A secondary query class using the current class as primary query
	 */
	public function useTelefonoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTelefono($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Telefono', 'TelefonoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Persona $persona Object to remove from the list of results
	 *
	 * @return    PersonaQuery The current query, for fluid interface
	 */
	public function prune($persona = null)
	{
		if ($persona) {
			$this->addUsingAlias(PersonaPeer::NRO_DOC, $persona->getNroDoc(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePersonaQuery