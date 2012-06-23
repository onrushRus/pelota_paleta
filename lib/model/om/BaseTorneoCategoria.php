<?php


/**
 * Base class that represents a row from the 'torneo_categoria' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTorneoCategoria extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'TorneoCategoriaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        TorneoCategoriaPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id_torneo_categoria field.
	 * @var        int
	 */
	protected $id_torneo_categoria;

	/**
	 * The value for the torneo_id field.
	 * @var        int
	 */
	protected $torneo_id;

	/**
	 * The value for the categoria_id field.
	 * @var        int
	 */
	protected $categoria_id;

	/**
	 * @var        Torneo
	 */
	protected $aTorneo;

	/**
	 * @var        Categoria
	 */
	protected $aCategoria;

	/**
	 * @var        array Inscripto[] Collection to store aggregation of Inscripto objects.
	 */
	protected $collInscriptos;

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
	protected $inscriptosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $resultadoTorneosScheduledForDeletion = null;

	/**
	 * Get the [id_torneo_categoria] column value.
	 * 
	 * @return     int
	 */
	public function getIdTorneoCategoria()
	{
		return $this->id_torneo_categoria;
	}

	/**
	 * Get the [torneo_id] column value.
	 * 
	 * @return     int
	 */
	public function getTorneoId()
	{
		return $this->torneo_id;
	}

	/**
	 * Get the [categoria_id] column value.
	 * 
	 * @return     int
	 */
	public function getCategoriaId()
	{
		return $this->categoria_id;
	}

	/**
	 * Set the value of [id_torneo_categoria] column.
	 * 
	 * @param      int $v new value
	 * @return     TorneoCategoria The current object (for fluent API support)
	 */
	public function setIdTorneoCategoria($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_torneo_categoria !== $v) {
			$this->id_torneo_categoria = $v;
			$this->modifiedColumns[] = TorneoCategoriaPeer::ID_TORNEO_CATEGORIA;
		}

		return $this;
	} // setIdTorneoCategoria()

	/**
	 * Set the value of [torneo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     TorneoCategoria The current object (for fluent API support)
	 */
	public function setTorneoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->torneo_id !== $v) {
			$this->torneo_id = $v;
			$this->modifiedColumns[] = TorneoCategoriaPeer::TORNEO_ID;
		}

		if ($this->aTorneo !== null && $this->aTorneo->getId() !== $v) {
			$this->aTorneo = null;
		}

		return $this;
	} // setTorneoId()

	/**
	 * Set the value of [categoria_id] column.
	 * 
	 * @param      int $v new value
	 * @return     TorneoCategoria The current object (for fluent API support)
	 */
	public function setCategoriaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->categoria_id !== $v) {
			$this->categoria_id = $v;
			$this->modifiedColumns[] = TorneoCategoriaPeer::CATEGORIA_ID;
		}

		if ($this->aCategoria !== null && $this->aCategoria->getId() !== $v) {
			$this->aCategoria = null;
		}

		return $this;
	} // setCategoriaId()

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

			$this->id_torneo_categoria = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->torneo_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->categoria_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = TorneoCategoriaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating TorneoCategoria object", $e);
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

		if ($this->aTorneo !== null && $this->torneo_id !== $this->aTorneo->getId()) {
			$this->aTorneo = null;
		}
		if ($this->aCategoria !== null && $this->categoria_id !== $this->aCategoria->getId()) {
			$this->aCategoria = null;
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
			$con = Propel::getConnection(TorneoCategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = TorneoCategoriaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aTorneo = null;
			$this->aCategoria = null;
			$this->collInscriptos = null;

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
			$con = Propel::getConnection(TorneoCategoriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = TorneoCategoriaQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseTorneoCategoria:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseTorneoCategoria:delete:post') as $callable)
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
			$con = Propel::getConnection(TorneoCategoriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseTorneoCategoria:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseTorneoCategoria:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				TorneoCategoriaPeer::addInstanceToPool($this);
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

			if ($this->aTorneo !== null) {
				if ($this->aTorneo->isModified() || $this->aTorneo->isNew()) {
					$affectedRows += $this->aTorneo->save($con);
				}
				$this->setTorneo($this->aTorneo);
			}

			if ($this->aCategoria !== null) {
				if ($this->aCategoria->isModified() || $this->aCategoria->isNew()) {
					$affectedRows += $this->aCategoria->save($con);
				}
				$this->setCategoria($this->aCategoria);
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

			if ($this->inscriptosScheduledForDeletion !== null) {
				if (!$this->inscriptosScheduledForDeletion->isEmpty()) {
					InscriptoQuery::create()
						->filterByPrimaryKeys($this->inscriptosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->inscriptosScheduledForDeletion = null;
				}
			}

			if ($this->collInscriptos !== null) {
				foreach ($this->collInscriptos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

		$this->modifiedColumns[] = TorneoCategoriaPeer::ID_TORNEO_CATEGORIA;
		if (null !== $this->id_torneo_categoria) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . TorneoCategoriaPeer::ID_TORNEO_CATEGORIA . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA)) {
			$modifiedColumns[':p' . $index++]  = '`ID_TORNEO_CATEGORIA`';
		}
		if ($this->isColumnModified(TorneoCategoriaPeer::TORNEO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`TORNEO_ID`';
		}
		if ($this->isColumnModified(TorneoCategoriaPeer::CATEGORIA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CATEGORIA_ID`';
		}

		$sql = sprintf(
			'INSERT INTO `torneo_categoria` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID_TORNEO_CATEGORIA`':
						$stmt->bindValue($identifier, $this->id_torneo_categoria, PDO::PARAM_INT);
						break;
					case '`TORNEO_ID`':
						$stmt->bindValue($identifier, $this->torneo_id, PDO::PARAM_INT);
						break;
					case '`CATEGORIA_ID`':
						$stmt->bindValue($identifier, $this->categoria_id, PDO::PARAM_INT);
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
		$this->setIdTorneoCategoria($pk);

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

			if ($this->aTorneo !== null) {
				if (!$this->aTorneo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTorneo->getValidationFailures());
				}
			}

			if ($this->aCategoria !== null) {
				if (!$this->aCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategoria->getValidationFailures());
				}
			}


			if (($retval = TorneoCategoriaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInscriptos !== null) {
					foreach ($this->collInscriptos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = TorneoCategoriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdTorneoCategoria();
				break;
			case 1:
				return $this->getTorneoId();
				break;
			case 2:
				return $this->getCategoriaId();
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
		if (isset($alreadyDumpedObjects['TorneoCategoria'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['TorneoCategoria'][$this->getPrimaryKey()] = true;
		$keys = TorneoCategoriaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdTorneoCategoria(),
			$keys[1] => $this->getTorneoId(),
			$keys[2] => $this->getCategoriaId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aTorneo) {
				$result['Torneo'] = $this->aTorneo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aCategoria) {
				$result['Categoria'] = $this->aCategoria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collInscriptos) {
				$result['Inscriptos'] = $this->collInscriptos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = TorneoCategoriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdTorneoCategoria($value);
				break;
			case 1:
				$this->setTorneoId($value);
				break;
			case 2:
				$this->setCategoriaId($value);
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
		$keys = TorneoCategoriaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdTorneoCategoria($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTorneoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCategoriaId($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TorneoCategoriaPeer::DATABASE_NAME);

		if ($this->isColumnModified(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA)) $criteria->add(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA, $this->id_torneo_categoria);
		if ($this->isColumnModified(TorneoCategoriaPeer::TORNEO_ID)) $criteria->add(TorneoCategoriaPeer::TORNEO_ID, $this->torneo_id);
		if ($this->isColumnModified(TorneoCategoriaPeer::CATEGORIA_ID)) $criteria->add(TorneoCategoriaPeer::CATEGORIA_ID, $this->categoria_id);

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
		$criteria = new Criteria(TorneoCategoriaPeer::DATABASE_NAME);
		$criteria->add(TorneoCategoriaPeer::ID_TORNEO_CATEGORIA, $this->id_torneo_categoria);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdTorneoCategoria();
	}

	/**
	 * Generic method to set the primary key (id_torneo_categoria column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdTorneoCategoria($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdTorneoCategoria();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of TorneoCategoria (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setTorneoId($this->getTorneoId());
		$copyObj->setCategoriaId($this->getCategoriaId());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getInscriptos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addInscripto($relObj->copy($deepCopy));
				}
			}

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
			$copyObj->setIdTorneoCategoria(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     TorneoCategoria Clone of current object.
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
	 * @return     TorneoCategoriaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TorneoCategoriaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Torneo object.
	 *
	 * @param      Torneo $v
	 * @return     TorneoCategoria The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTorneo(Torneo $v = null)
	{
		if ($v === null) {
			$this->setTorneoId(NULL);
		} else {
			$this->setTorneoId($v->getId());
		}

		$this->aTorneo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Torneo object, it will not be re-added.
		if ($v !== null) {
			$v->addTorneoCategoria($this);
		}

		return $this;
	}


	/**
	 * Get the associated Torneo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Torneo The associated Torneo object.
	 * @throws     PropelException
	 */
	public function getTorneo(PropelPDO $con = null)
	{
		if ($this->aTorneo === null && ($this->torneo_id !== null)) {
			$this->aTorneo = TorneoQuery::create()->findPk($this->torneo_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aTorneo->addTorneoCategorias($this);
			 */
		}
		return $this->aTorneo;
	}

	/**
	 * Declares an association between this object and a Categoria object.
	 *
	 * @param      Categoria $v
	 * @return     TorneoCategoria The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCategoria(Categoria $v = null)
	{
		if ($v === null) {
			$this->setCategoriaId(NULL);
		} else {
			$this->setCategoriaId($v->getId());
		}

		$this->aCategoria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Categoria object, it will not be re-added.
		if ($v !== null) {
			$v->addTorneoCategoria($this);
		}

		return $this;
	}


	/**
	 * Get the associated Categoria object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Categoria The associated Categoria object.
	 * @throws     PropelException
	 */
	public function getCategoria(PropelPDO $con = null)
	{
		if ($this->aCategoria === null && ($this->categoria_id !== null)) {
			$this->aCategoria = CategoriaQuery::create()->findPk($this->categoria_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCategoria->addTorneoCategorias($this);
			 */
		}
		return $this->aCategoria;
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
		if ('Inscripto' == $relationName) {
			return $this->initInscriptos();
		}
		if ('ResultadoTorneo' == $relationName) {
			return $this->initResultadoTorneos();
		}
	}

	/**
	 * Clears out the collInscriptos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addInscriptos()
	 */
	public function clearInscriptos()
	{
		$this->collInscriptos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collInscriptos collection.
	 *
	 * By default this just sets the collInscriptos collection to an empty array (like clearcollInscriptos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initInscriptos($overrideExisting = true)
	{
		if (null !== $this->collInscriptos && !$overrideExisting) {
			return;
		}
		$this->collInscriptos = new PropelObjectCollection();
		$this->collInscriptos->setModel('Inscripto');
	}

	/**
	 * Gets an array of Inscripto objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this TorneoCategoria is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Inscripto[] List of Inscripto objects
	 * @throws     PropelException
	 */
	public function getInscriptos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collInscriptos || null !== $criteria) {
			if ($this->isNew() && null === $this->collInscriptos) {
				// return empty collection
				$this->initInscriptos();
			} else {
				$collInscriptos = InscriptoQuery::create(null, $criteria)
					->filterByTorneoCategoria($this)
					->find($con);
				if (null !== $criteria) {
					return $collInscriptos;
				}
				$this->collInscriptos = $collInscriptos;
			}
		}
		return $this->collInscriptos;
	}

	/**
	 * Sets a collection of Inscripto objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $inscriptos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setInscriptos(PropelCollection $inscriptos, PropelPDO $con = null)
	{
		$this->inscriptosScheduledForDeletion = $this->getInscriptos(new Criteria(), $con)->diff($inscriptos);

		foreach ($inscriptos as $inscripto) {
			// Fix issue with collection modified by reference
			if ($inscripto->isNew()) {
				$inscripto->setTorneoCategoria($this);
			}
			$this->addInscripto($inscripto);
		}

		$this->collInscriptos = $inscriptos;
	}

	/**
	 * Returns the number of related Inscripto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Inscripto objects.
	 * @throws     PropelException
	 */
	public function countInscriptos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collInscriptos || null !== $criteria) {
			if ($this->isNew() && null === $this->collInscriptos) {
				return 0;
			} else {
				$query = InscriptoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByTorneoCategoria($this)
					->count($con);
			}
		} else {
			return count($this->collInscriptos);
		}
	}

	/**
	 * Method called to associate a Inscripto object to this object
	 * through the Inscripto foreign key attribute.
	 *
	 * @param      Inscripto $l Inscripto
	 * @return     TorneoCategoria The current object (for fluent API support)
	 */
	public function addInscripto(Inscripto $l)
	{
		if ($this->collInscriptos === null) {
			$this->initInscriptos();
		}
		if (!$this->collInscriptos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddInscripto($l);
		}

		return $this;
	}

	/**
	 * @param	Inscripto $inscripto The inscripto object to add.
	 */
	protected function doAddInscripto($inscripto)
	{
		$this->collInscriptos[]= $inscripto;
		$inscripto->setTorneoCategoria($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TorneoCategoria is new, it will return
	 * an empty collection; or if this TorneoCategoria has previously
	 * been saved, it will retrieve related Inscriptos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TorneoCategoria.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Inscripto[] List of Inscripto objects
	 */
	public function getInscriptosJoinRanking($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = InscriptoQuery::create(null, $criteria);
		$query->joinWith('Ranking', $join_behavior);

		return $this->getInscriptos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TorneoCategoria is new, it will return
	 * an empty collection; or if this TorneoCategoria has previously
	 * been saved, it will retrieve related Inscriptos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TorneoCategoria.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Inscripto[] List of Inscripto objects
	 */
	public function getInscriptosJoinClub($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = InscriptoQuery::create(null, $criteria);
		$query->joinWith('Club', $join_behavior);

		return $this->getInscriptos($query, $con);
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
	 * If this TorneoCategoria is new, it will return
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
					->filterByTorneoCategoria($this)
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
				$resultadoTorneo->setTorneoCategoria($this);
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
					->filterByTorneoCategoria($this)
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
	 * @return     TorneoCategoria The current object (for fluent API support)
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
		$resultadoTorneo->setTorneoCategoria($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this TorneoCategoria is new, it will return
	 * an empty collection; or if this TorneoCategoria has previously
	 * been saved, it will retrieve related ResultadoTorneos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TorneoCategoria.
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
	 * Otherwise if this TorneoCategoria is new, it will return
	 * an empty collection; or if this TorneoCategoria has previously
	 * been saved, it will retrieve related ResultadoTorneos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in TorneoCategoria.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ResultadoTorneo[] List of ResultadoTorneo objects
	 */
	public function getResultadoTorneosJoinInscripto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ResultadoTorneoQuery::create(null, $criteria);
		$query->joinWith('Inscripto', $join_behavior);

		return $this->getResultadoTorneos($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id_torneo_categoria = null;
		$this->torneo_id = null;
		$this->categoria_id = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collInscriptos) {
				foreach ($this->collInscriptos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collResultadoTorneos) {
				foreach ($this->collResultadoTorneos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collInscriptos instanceof PropelCollection) {
			$this->collInscriptos->clearIterator();
		}
		$this->collInscriptos = null;
		if ($this->collResultadoTorneos instanceof PropelCollection) {
			$this->collResultadoTorneos->clearIterator();
		}
		$this->collResultadoTorneos = null;
		$this->aTorneo = null;
		$this->aCategoria = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(TorneoCategoriaPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseTorneoCategoria:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseTorneoCategoria
