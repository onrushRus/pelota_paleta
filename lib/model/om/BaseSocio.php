<?php


/**
 * Base class that represents a row from the 'socio' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSocio extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SocioPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SocioPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the persona_nro_doc field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $persona_nro_doc;

	/**
	 * The value for the fecha_alta field.
	 * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
	 * @var        string
	 */
	protected $fecha_alta;

	/**
	 * The value for the vitalicio field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $vitalicio;

	/**
	 * The value for the activo field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $activo;

	/**
	 * @var        Persona
	 */
	protected $aPersona;

	/**
	 * @var        array Reserva[] Collection to store aggregation of Reserva objects.
	 */
	protected $collReservas;

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
	protected $reservasScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->persona_nro_doc = 0;
		$this->vitalicio = false;
		$this->activo = false;
	}

	/**
	 * Initializes internal state of BaseSocio object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
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
	 * Get the [optionally formatted] temporal [fecha_alta] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFechaAlta($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_alta === null) {
			return null;
		}


		if ($this->fecha_alta === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_alta);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_alta, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [vitalicio] column value.
	 * 
	 * @return     boolean
	 */
	public function getVitalicio()
	{
		return $this->vitalicio;
	}

	/**
	 * Get the [activo] column value.
	 * 
	 * @return     boolean
	 */
	public function getActivo()
	{
		return $this->activo;
	}

	/**
	 * Set the value of [persona_nro_doc] column.
	 * 
	 * @param      int $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setPersonaNroDoc($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->persona_nro_doc !== $v) {
			$this->persona_nro_doc = $v;
			$this->modifiedColumns[] = SocioPeer::PERSONA_NRO_DOC;
		}

		if ($this->aPersona !== null && $this->aPersona->getNroDoc() !== $v) {
			$this->aPersona = null;
		}

		return $this;
	} // setPersonaNroDoc()

	/**
	 * Sets the value of [fecha_alta] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setFechaAlta($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha_alta !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha_alta !== null && $tmpDt = new DateTime($this->fecha_alta)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha_alta = $newDateAsString;
				$this->modifiedColumns[] = SocioPeer::FECHA_ALTA;
			}
		} // if either are not null

		return $this;
	} // setFechaAlta()

	/**
	 * Sets the value of the [vitalicio] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setVitalicio($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->vitalicio !== $v) {
			$this->vitalicio = $v;
			$this->modifiedColumns[] = SocioPeer::VITALICIO;
		}

		return $this;
	} // setVitalicio()

	/**
	 * Sets the value of the [activo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setActivo($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->activo !== $v) {
			$this->activo = $v;
			$this->modifiedColumns[] = SocioPeer::ACTIVO;
		}

		return $this;
	} // setActivo()

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
			if ($this->persona_nro_doc !== 0) {
				return false;
			}

			if ($this->vitalicio !== false) {
				return false;
			}

			if ($this->activo !== false) {
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

			$this->persona_nro_doc = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fecha_alta = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->vitalicio = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
			$this->activo = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = SocioPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Socio object", $e);
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

		if ($this->aPersona !== null && $this->persona_nro_doc !== $this->aPersona->getNroDoc()) {
			$this->aPersona = null;
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
			$con = Propel::getConnection(SocioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SocioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aPersona = null;
			$this->collReservas = null;

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
			$con = Propel::getConnection(SocioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = SocioQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseSocio:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseSocio:delete:post') as $callable)
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
			$con = Propel::getConnection(SocioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseSocio:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseSocio:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				SocioPeer::addInstanceToPool($this);
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

			if ($this->aPersona !== null) {
				if ($this->aPersona->isModified() || $this->aPersona->isNew()) {
					$affectedRows += $this->aPersona->save($con);
				}
				$this->setPersona($this->aPersona);
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

			if ($this->reservasScheduledForDeletion !== null) {
				if (!$this->reservasScheduledForDeletion->isEmpty()) {
					ReservaQuery::create()
						->filterByPrimaryKeys($this->reservasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->reservasScheduledForDeletion = null;
				}
			}

			if ($this->collReservas !== null) {
				foreach ($this->collReservas as $referrerFK) {
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


		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(SocioPeer::PERSONA_NRO_DOC)) {
			$modifiedColumns[':p' . $index++]  = '`PERSONA_NRO_DOC`';
		}
		if ($this->isColumnModified(SocioPeer::FECHA_ALTA)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA_ALTA`';
		}
		if ($this->isColumnModified(SocioPeer::VITALICIO)) {
			$modifiedColumns[':p' . $index++]  = '`VITALICIO`';
		}
		if ($this->isColumnModified(SocioPeer::ACTIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ACTIVO`';
		}

		$sql = sprintf(
			'INSERT INTO `socio` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`PERSONA_NRO_DOC`':
						$stmt->bindValue($identifier, $this->persona_nro_doc, PDO::PARAM_INT);
						break;
					case '`FECHA_ALTA`':
						$stmt->bindValue($identifier, $this->fecha_alta, PDO::PARAM_STR);
						break;
					case '`VITALICIO`':
						$stmt->bindValue($identifier, (int) $this->vitalicio, PDO::PARAM_INT);
						break;
					case '`ACTIVO`':
						$stmt->bindValue($identifier, (int) $this->activo, PDO::PARAM_INT);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

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

			if ($this->aPersona !== null) {
				if (!$this->aPersona->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPersona->getValidationFailures());
				}
			}


			if (($retval = SocioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collReservas !== null) {
					foreach ($this->collReservas as $referrerFK) {
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
		$pos = SocioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPersonaNroDoc();
				break;
			case 1:
				return $this->getFechaAlta();
				break;
			case 2:
				return $this->getVitalicio();
				break;
			case 3:
				return $this->getActivo();
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
		if (isset($alreadyDumpedObjects['Socio'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Socio'][$this->getPrimaryKey()] = true;
		$keys = SocioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPersonaNroDoc(),
			$keys[1] => $this->getFechaAlta(),
			$keys[2] => $this->getVitalicio(),
			$keys[3] => $this->getActivo(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aPersona) {
				$result['Persona'] = $this->aPersona->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collReservas) {
				$result['Reservas'] = $this->collReservas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = SocioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPersonaNroDoc($value);
				break;
			case 1:
				$this->setFechaAlta($value);
				break;
			case 2:
				$this->setVitalicio($value);
				break;
			case 3:
				$this->setActivo($value);
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
		$keys = SocioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPersonaNroDoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechaAlta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVitalicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setActivo($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SocioPeer::DATABASE_NAME);

		if ($this->isColumnModified(SocioPeer::PERSONA_NRO_DOC)) $criteria->add(SocioPeer::PERSONA_NRO_DOC, $this->persona_nro_doc);
		if ($this->isColumnModified(SocioPeer::FECHA_ALTA)) $criteria->add(SocioPeer::FECHA_ALTA, $this->fecha_alta);
		if ($this->isColumnModified(SocioPeer::VITALICIO)) $criteria->add(SocioPeer::VITALICIO, $this->vitalicio);
		if ($this->isColumnModified(SocioPeer::ACTIVO)) $criteria->add(SocioPeer::ACTIVO, $this->activo);

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
		$criteria = new Criteria(SocioPeer::DATABASE_NAME);
		$criteria->add(SocioPeer::PERSONA_NRO_DOC, $this->persona_nro_doc);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getPersonaNroDoc();
	}

	/**
	 * Generic method to set the primary key (persona_nro_doc column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setPersonaNroDoc($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getPersonaNroDoc();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Socio (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setFechaAlta($this->getFechaAlta());
		$copyObj->setVitalicio($this->getVitalicio());
		$copyObj->setActivo($this->getActivo());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getReservas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addReserva($relObj->copy($deepCopy));
				}
			}

			$relObj = $this->getPersona();
			if ($relObj) {
				$copyObj->setPersona($relObj->copy($deepCopy));
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setPersonaNroDoc('0'); // this is a auto-increment column, so set to default value
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
	 * @return     Socio Clone of current object.
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
	 * @return     SocioPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SocioPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Persona object.
	 *
	 * @param      Persona $v
	 * @return     Socio The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPersona(Persona $v = null)
	{
		if ($v === null) {
			$this->setPersonaNroDoc(0);
		} else {
			$this->setPersonaNroDoc($v->getNroDoc());
		}

		$this->aPersona = $v;

		// Add binding for other direction of this 1:1 relationship.
		if ($v !== null) {
			$v->setSocio($this);
		}

		return $this;
	}


	/**
	 * Get the associated Persona object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Persona The associated Persona object.
	 * @throws     PropelException
	 */
	public function getPersona(PropelPDO $con = null)
	{
		if ($this->aPersona === null && ($this->persona_nro_doc !== null)) {
			$this->aPersona = PersonaQuery::create()->findPk($this->persona_nro_doc, $con);
			// Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
			$this->aPersona->setSocio($this);
		}
		return $this->aPersona;
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
		if ('Reserva' == $relationName) {
			return $this->initReservas();
		}
	}

	/**
	 * Clears out the collReservas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addReservas()
	 */
	public function clearReservas()
	{
		$this->collReservas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collReservas collection.
	 *
	 * By default this just sets the collReservas collection to an empty array (like clearcollReservas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initReservas($overrideExisting = true)
	{
		if (null !== $this->collReservas && !$overrideExisting) {
			return;
		}
		$this->collReservas = new PropelObjectCollection();
		$this->collReservas->setModel('Reserva');
	}

	/**
	 * Gets an array of Reserva objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Socio is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Reserva[] List of Reserva objects
	 * @throws     PropelException
	 */
	public function getReservas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collReservas || null !== $criteria) {
			if ($this->isNew() && null === $this->collReservas) {
				// return empty collection
				$this->initReservas();
			} else {
				$collReservas = ReservaQuery::create(null, $criteria)
					->filterBySocio($this)
					->find($con);
				if (null !== $criteria) {
					return $collReservas;
				}
				$this->collReservas = $collReservas;
			}
		}
		return $this->collReservas;
	}

	/**
	 * Sets a collection of Reserva objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $reservas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setReservas(PropelCollection $reservas, PropelPDO $con = null)
	{
		$this->reservasScheduledForDeletion = $this->getReservas(new Criteria(), $con)->diff($reservas);

		foreach ($reservas as $reserva) {
			// Fix issue with collection modified by reference
			if ($reserva->isNew()) {
				$reserva->setSocio($this);
			}
			$this->addReserva($reserva);
		}

		$this->collReservas = $reservas;
	}

	/**
	 * Returns the number of related Reserva objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Reserva objects.
	 * @throws     PropelException
	 */
	public function countReservas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collReservas || null !== $criteria) {
			if ($this->isNew() && null === $this->collReservas) {
				return 0;
			} else {
				$query = ReservaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySocio($this)
					->count($con);
			}
		} else {
			return count($this->collReservas);
		}
	}

	/**
	 * Method called to associate a Reserva object to this object
	 * through the Reserva foreign key attribute.
	 *
	 * @param      Reserva $l Reserva
	 * @return     Socio The current object (for fluent API support)
	 */
	public function addReserva(Reserva $l)
	{
		if ($this->collReservas === null) {
			$this->initReservas();
		}
		if (!$this->collReservas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddReserva($l);
		}

		return $this;
	}

	/**
	 * @param	Reserva $reserva The reserva object to add.
	 */
	protected function doAddReserva($reserva)
	{
		$this->collReservas[]= $reserva;
		$reserva->setSocio($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Socio is new, it will return
	 * an empty collection; or if this Socio has previously
	 * been saved, it will retrieve related Reservas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Socio.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Reserva[] List of Reserva objects
	 */
	public function getReservasJoinTipoReserva($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ReservaQuery::create(null, $criteria);
		$query->joinWith('TipoReserva', $join_behavior);

		return $this->getReservas($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->persona_nro_doc = null;
		$this->fecha_alta = null;
		$this->vitalicio = null;
		$this->activo = null;
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
			if ($this->collReservas) {
				foreach ($this->collReservas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collReservas instanceof PropelCollection) {
			$this->collReservas->clearIterator();
		}
		$this->collReservas = null;
		$this->aPersona = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SocioPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseSocio:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseSocio
