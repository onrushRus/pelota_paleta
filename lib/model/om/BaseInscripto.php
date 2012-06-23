<?php


/**
 * Base class that represents a row from the 'inscripto' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseInscripto extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'InscriptoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        InscriptoPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the persona_nro_doc field.
	 * @var        int
	 */
	protected $persona_nro_doc;

	/**
	 * The value for the torneo_cat_id field.
	 * @var        int
	 */
	protected $torneo_cat_id;

	/**
	 * The value for the nro_equipo field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $nro_equipo;

	/**
	 * The value for the club_representado field.
	 * @var        int
	 */
	protected $club_representado;

	/**
	 * @var        Ranking
	 */
	protected $aRanking;

	/**
	 * @var        TorneoCategoria
	 */
	protected $aTorneoCategoria;

	/**
	 * @var        Club
	 */
	protected $aClub;

	/**
	 * @var        array ResultadoTorneo[] Collection to store aggregation of ResultadoTorneo objects.
	 */
	protected $collResultadoTorneos;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $resultadoTorneosScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->nro_equipo = 0;
	}

	/**
	 * Initializes internal state of BaseInscripto object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [persona_nro_doc] column value.
	 * 
	 * @return     int
	 */
	public function getPersonaNroDoc()
	{
		return $this->persona_nro_doc;
	}

	/**
	 * Get the [torneo_cat_id] column value.
	 * 
	 * @return     int
	 */
	public function getTorneoCatId()
	{
		return $this->torneo_cat_id;
	}

	/**
	 * Get the [nro_equipo] column value.
	 * 
	 * @return     int
	 */
	public function getNroEquipo()
	{
		return $this->nro_equipo;
	}

	/**
	 * Get the [club_representado] column value.
	 * 
	 * @return     int
	 */
	public function getClubRepresentado()
	{
		return $this->club_representado;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Inscripto The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = InscriptoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [persona_nro_doc] column.
	 * 
	 * @param      int $v new value
	 * @return     Inscripto The current object (for fluent API support)
	 */
	public function setPersonaNroDoc($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->persona_nro_doc !== $v) {
			$this->persona_nro_doc = $v;
			$this->modifiedColumns[] = InscriptoPeer::PERSONA_NRO_DOC;
		}

		if ($this->aRanking !== null && $this->aRanking->getPelotariNroDoc() !== $v) {
			$this->aRanking = null;
		}

		return $this;
	} // setPersonaNroDoc()

	/**
	 * Set the value of [torneo_cat_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Inscripto The current object (for fluent API support)
	 */
	public function setTorneoCatId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->torneo_cat_id !== $v) {
			$this->torneo_cat_id = $v;
			$this->modifiedColumns[] = InscriptoPeer::TORNEO_CAT_ID;
		}

		if ($this->aTorneoCategoria !== null && $this->aTorneoCategoria->getIdTorneoCategoria() !== $v) {
			$this->aTorneoCategoria = null;
		}

		return $this;
	} // setTorneoCatId()

	/**
	 * Set the value of [nro_equipo] column.
	 * 
	 * @param      int $v new value
	 * @return     Inscripto The current object (for fluent API support)
	 */
	public function setNroEquipo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->nro_equipo !== $v) {
			$this->nro_equipo = $v;
			$this->modifiedColumns[] = InscriptoPeer::NRO_EQUIPO;
		}

		return $this;
	} // setNroEquipo()

	/**
	 * Set the value of [club_representado] column.
	 * 
	 * @param      int $v new value
	 * @return     Inscripto The current object (for fluent API support)
	 */
	public function setClubRepresentado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->club_representado !== $v) {
			$this->club_representado = $v;
			$this->modifiedColumns[] = InscriptoPeer::CLUB_REPRESENTADO;
		}

		if ($this->aClub !== null && $this->aClub->getId() !== $v) {
			$this->aClub = null;
		}

		return $this;
	} // setClubRepresentado()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->nro_equipo !== 0) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->persona_nro_doc = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->torneo_cat_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->nro_equipo = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->club_representado = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = InscriptoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Inscripto object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aRanking !== null && $this->persona_nro_doc !== $this->aRanking->getPelotariNroDoc()) {
			$this->aRanking = null;
		}
		if ($this->aTorneoCategoria !== null && $this->torneo_cat_id !== $this->aTorneoCategoria->getIdTorneoCategoria()) {
			$this->aTorneoCategoria = null;
		}
		if ($this->aClub !== null && $this->club_representado !== $this->aClub->getId()) {
			$this->aClub = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InscriptoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = InscriptoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aRanking = null;
			$this->aTorneoCategoria = null;
			$this->aClub = null;
			$this->collResultadoTorneos = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InscriptoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = InscriptoQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseInscripto:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseInscripto:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InscriptoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseInscripto:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseInscripto:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				InscriptoPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aRanking !== null) {
				if ($this->aRanking->isModified() || $this->aRanking->isNew()) {
					$affectedRows += $this->aRanking->save($con);
				}
				$this->setRanking($this->aRanking);
			}

			if ($this->aTorneoCategoria !== null) {
				if ($this->aTorneoCategoria->isModified() || $this->aTorneoCategoria->isNew()) {
					$affectedRows += $this->aTorneoCategoria->save($con);
				}
				$this->setTorneoCategoria($this->aTorneoCategoria);
			}

			if ($this->aClub !== null) {
				if ($this->aClub->isModified() || $this->aClub->isNew()) {
					$affectedRows += $this->aClub->save($con);
				}
				$this->setClub($this->aClub);
			}

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			if ($this->resultadoTorneosScheduledForDeletion !== null) {
				if (!$this->resultadoTorneosScheduledForDeletion->isEmpty()) {
					ResultadoTorneoQuery::create()
						->filterByPrimaryKeys($this->resultadoTorneosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->resultadoTorneosScheduledForDeletion = null;
				}
			}

			if ($this->collResultadoTorneos !== null) {
				foreach ($this->collResultadoTorneos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = InscriptoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . InscriptoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(InscriptoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(InscriptoPeer::PERSONA_NRO_DOC)) {
			$modifiedColumns[':p' . $index++]  = '`PERSONA_NRO_DOC`';
		}
		if ($this->isColumnModified(InscriptoPeer::TORNEO_CAT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`TORNEO_CAT_ID`';
		}
		if ($this->isColumnModified(InscriptoPeer::NRO_EQUIPO)) {
			$modifiedColumns[':p' . $index++]  = '`NRO_EQUIPO`';
		}
		if ($this->isColumnModified(InscriptoPeer::CLUB_REPRESENTADO)) {
			$modifiedColumns[':p' . $index++]  = '`CLUB_REPRESENTADO`';
		}

		$sql = sprintf(
			'INSERT INTO `inscripto` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`PERSONA_NRO_DOC`':
						$stmt->bindValue($identifier, $this->persona_nro_doc, PDO::PARAM_INT);
						break;
					case '`TORNEO_CAT_ID`':
						$stmt->bindValue($identifier, $this->torneo_cat_id, PDO::PARAM_INT);
						break;
					case '`NRO_EQUIPO`':
						$stmt->bindValue($identifier, $this->nro_equipo, PDO::PARAM_INT);
						break;
					case '`CLUB_REPRESENTADO`':
						$stmt->bindValue($identifier, $this->club_representado, PDO::PARAM_INT);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aRanking !== null) {
				if (!$this->aRanking->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRanking->getValidationFailures());
				}
			}

			if ($this->aTorneoCategoria !== null) {
				if (!$this->aTorneoCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTorneoCategoria->getValidationFailures());
				}
			}

			if ($this->aClub !== null) {
				if (!$this->aClub->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClub->getValidationFailures());
				}
			}


			if (($retval = InscriptoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collResultadoTorneos !== null) {
					foreach ($this->collResultadoTorneos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InscriptoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPersonaNroDoc();
				break;
			case 2:
				return $this->getTorneoCatId();
				break;
			case 3:
				return $this->getNroEquipo();
				break;
			case 4:
				return $this->getClubRepresentado();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Inscripto'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Inscripto'][$this->getPrimaryKey()] = true;
		$keys = InscriptoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPersonaNroDoc(),
			$keys[2] => $this->getTorneoCatId(),
			$keys[3] => $this->getNroEquipo(),
			$keys[4] => $this->getClubRepresentado(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aRanking) {
				$result['Ranking'] = $this->aRanking->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aTorneoCategoria) {
				$result['TorneoCategoria'] = $this->aTorneoCategoria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aClub) {
				$result['Club'] = $this->aClub->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collResultadoTorneos) {
				$result['ResultadoTorneos'] = $this->collResultadoTorneos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InscriptoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPersonaNroDoc($value);
				break;
			case 2:
				$this->setTorneoCatId($value);
				break;
			case 3:
				$this->setNroEquipo($value);
				break;
			case 4:
				$this->setClubRepresentado($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InscriptoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPersonaNroDoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTorneoCatId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNroEquipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setClubRepresentado($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(InscriptoPeer::DATABASE_NAME);

		if ($this->isColumnModified(InscriptoPeer::ID)) $criteria->add(InscriptoPeer::ID, $this->id);
		if ($this->isColumnModified(InscriptoPeer::PERSONA_NRO_DOC)) $criteria->add(InscriptoPeer::PERSONA_NRO_DOC, $this->persona_nro_doc);
		if ($this->isColumnModified(InscriptoPeer::TORNEO_CAT_ID)) $criteria->add(InscriptoPeer::TORNEO_CAT_ID, $this->torneo_cat_id);
		if ($this->isColumnModified(InscriptoPeer::NRO_EQUIPO)) $criteria->add(InscriptoPeer::NRO_EQUIPO, $this->nro_equipo);
		if ($this->isColumnModified(InscriptoPeer::CLUB_REPRESENTADO)) $criteria->add(InscriptoPeer::CLUB_REPRESENTADO, $this->club_representado);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InscriptoPeer::DATABASE_NAME);
		$criteria->add(InscriptoPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Inscripto (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setPersonaNroDoc($this->getPersonaNroDoc());
		$copyObj->setTorneoCatId($this->getTorneoCatId());
		$copyObj->setNroEquipo($this->getNroEquipo());
		$copyObj->setClubRepresentado($this->getClubRepresentado());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getResultadoTorneos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addResultadoTorneo($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Inscripto Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     InscriptoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new InscriptoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Ranking object.
	 *
	 * @param      Ranking $v
	 * @return     Inscripto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setRanking(Ranking $v = null)
	{
		if ($v === null) {
			$this->setPersonaNroDoc(NULL);
		} else {
			$this->setPersonaNroDoc($v->getPelotariNroDoc());
		}

		$this->aRanking = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Ranking object, it will not be re-added.
		if ($v !== null) {
			$v->addInscripto($this);
		}

		return $this;
	}


	/**
	 * Get the associated Ranking object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Ranking The associated Ranking object.
	 * @throws     PropelException
	 */
	public function getRanking(PropelPDO $con = null)
	{
		if ($this->aRanking === null && ($this->persona_nro_doc !== null)) {
			$this->aRanking = RankingQuery::create()
				->filterByInscripto($this) // here
				->findOne($con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aRanking->addInscriptos($this);
			 */
		}
		return $this->aRanking;
	}

	/**
	 * Declares an association between this object and a TorneoCategoria object.
	 *
	 * @param      TorneoCategoria $v
	 * @return     Inscripto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTorneoCategoria(TorneoCategoria $v = null)
	{
		if ($v === null) {
			$this->setTorneoCatId(NULL);
		} else {
			$this->setTorneoCatId($v->getIdTorneoCategoria());
		}

		$this->aTorneoCategoria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the TorneoCategoria object, it will not be re-added.
		if ($v !== null) {
			$v->addInscripto($this);
		}

		return $this;
	}


	/**
	 * Get the associated TorneoCategoria object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     TorneoCategoria The associated TorneoCategoria object.
	 * @throws     PropelException
	 */
	public function getTorneoCategoria(PropelPDO $con = null)
	{
		if ($this->aTorneoCategoria === null && ($this->torneo_cat_id !== null)) {
			$this->aTorneoCategoria = TorneoCategoriaQuery::create()->findPk($this->torneo_cat_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aTorneoCategoria->addInscriptos($this);
			 */
		}
		return $this->aTorneoCategoria;
	}

	/**
	 * Declares an association between this object and a Club object.
	 *
	 * @param      Club $v
	 * @return     Inscripto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setClub(Club $v = null)
	{
		if ($v === null) {
			$this->setClubRepresentado(NULL);
		} else {
			$this->setClubRepresentado($v->getId());
		}

		$this->aClub = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Club object, it will not be re-added.
		if ($v !== null) {
			$v->addInscripto($this);
		}

		return $this;
	}


	/**
	 * Get the associated Club object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Club The associated Club object.
	 * @throws     PropelException
	 */
	public function getClub(PropelPDO $con = null)
	{
		if ($this->aClub === null && ($this->club_representado !== null)) {
			$this->aClub = ClubQuery::create()->findPk($this->club_representado, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aClub->addInscriptos($this);
			 */
		}
		return $this->aClub;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('ResultadoTorneo' == $relationName) {
			return $this->initResultadoTorneos();
		}
	}

	/**
	 * Clears out the collResultadoTorneos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addResultadoTorneos()
	 */
	public function clearResultadoTorneos()
	{
		$this->collResultadoTorneos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collResultadoTorneos collection.
	 *
	 * By default this just sets the collResultadoTorneos collection to an empty array (like clearcollResultadoTorneos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initResultadoTorneos($overrideExisting = true)
	{
		if (null !== $this->collResultadoTorneos && !$overrideExisting) {
			return;
		}
		$this->collResultadoTorneos = new PropelObjectCollection();
		$this->collResultadoTorneos->setModel('ResultadoTorneo');
	}

	/**
	 * Gets an array of ResultadoTorneo objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Inscripto is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ResultadoTorneo[] List of ResultadoTorneo objects
	 * @throws     PropelException
	 */
	public function getResultadoTorneos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collResultadoTorneos || null !== $criteria) {
			if ($this->isNew() && null === $this->collResultadoTorneos) {
				// return empty collection
				$this->initResultadoTorneos();
			} else {
				$collResultadoTorneos = ResultadoTorneoQuery::create(null, $criteria)
					->filterByInscripto($this)
					->find($con);
				if (null !== $criteria) {
					return $collResultadoTorneos;
				}
				$this->collResultadoTorneos = $collResultadoTorneos;
			}
		}
		return $this->collResultadoTorneos;
	}

	/**
	 * Sets a collection of ResultadoTorneo objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $resultadoTorneos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setResultadoTorneos(PropelCollection $resultadoTorneos, PropelPDO $con = null)
	{
		$this->resultadoTorneosScheduledForDeletion = $this->getResultadoTorneos(new Criteria(), $con)->diff($resultadoTorneos);

		foreach ($resultadoTorneos as $resultadoTorneo) {
			// Fix issue with collection modified by reference
			if ($resultadoTorneo->isNew()) {
				$resultadoTorneo->setInscripto($this);
			}
			$this->addResultadoTorneo($resultadoTorneo);
		}

		$this->collResultadoTorneos = $resultadoTorneos;
	}

	/**
	 * Returns the number of related ResultadoTorneo objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ResultadoTorneo objects.
	 * @throws     PropelException
	 */
	public function countResultadoTorneos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collResultadoTorneos || null !== $criteria) {
			if ($this->isNew() && null === $this->collResultadoTorneos) {
				return 0;
			} else {
				$query = ResultadoTorneoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByInscripto($this)
					->count($con);
			}
		} else {
			return count($this->collResultadoTorneos);
		}
	}

	/**
	 * Method called to associate a ResultadoTorneo object to this object
	 * through the ResultadoTorneo foreign key attribute.
	 *
	 * @param      ResultadoTorneo $l ResultadoTorneo
	 * @return     Inscripto The current object (for fluent API support)
	 */
	public function addResultadoTorneo(ResultadoTorneo $l)
	{
		if ($this->collResultadoTorneos === null) {
			$this->initResultadoTorneos();
		}
		if (!$this->collResultadoTorneos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddResultadoTorneo($l);
		}

		return $this;
	}

	/**
	 * @param	ResultadoTorneo $resultadoTorneo The resultadoTorneo object to add.
	 */
	protected function doAddResultadoTorneo($resultadoTorneo)
	{
		$this->collResultadoTorneos[]= $resultadoTorneo;
		$resultadoTorneo->setInscripto($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Inscripto is new, it will return
	 * an empty collection; or if this Inscripto has previously
	 * been saved, it will retrieve related ResultadoTorneos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Inscripto.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ResultadoTorneo[] List of ResultadoTorneo objects
	 */
	public function getResultadoTorneosJoinPuntosPuesto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ResultadoTorneoQuery::create(null, $criteria);
		$query->joinWith('PuntosPuesto', $join_behavior);

		return $this->getResultadoTorneos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Inscripto is new, it will return
	 * an empty collection; or if this Inscripto has previously
	 * been saved, it will retrieve related ResultadoTorneos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Inscripto.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ResultadoTorneo[] List of ResultadoTorneo objects
	 */
	public function getResultadoTorneosJoinTorneoCategoria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ResultadoTorneoQuery::create(null, $criteria);
		$query->joinWith('TorneoCategoria', $join_behavior);

		return $this->getResultadoTorneos($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->persona_nro_doc = null;
		$this->torneo_cat_id = null;
		$this->nro_equipo = null;
		$this->club_representado = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collResultadoTorneos) {
				foreach ($this->collResultadoTorneos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collResultadoTorneos instanceof PropelCollection) {
			$this->collResultadoTorneos->clearIterator();
		}
		$this->collResultadoTorneos = null;
		$this->aRanking = null;
		$this->aTorneoCategoria = null;
		$this->aClub = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(InscriptoPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseInscripto:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseInscripto
