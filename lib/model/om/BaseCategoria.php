<?php


/**
 * Base class that represents a row from the 'categoria' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCategoria extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CategoriaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CategoriaPeer
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
	 * The value for the descripcion_categoria field.
	 * @var        string
	 */
	protected $descripcion_categoria;

	/**
	 * The value for the edad_min field.
	 * @var        int
	 */
	protected $edad_min;

	/**
	 * The value for the edad_max field.
	 * @var        int
	 */
	protected $edad_max;

	/**
	 * @var        array Ranking[] Collection to store aggregation of Ranking objects.
	 */
	protected $collRankings;

	/**
	 * @var        array TorneoCategoria[] Collection to store aggregation of TorneoCategoria objects.
	 */
	protected $collTorneoCategorias;

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
	protected $rankingsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $torneoCategoriasScheduledForDeletion = null;

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
	 * Get the [descripcion_categoria] column value.
	 * 
	 * @return     string
	 */
	public function getDescripcionCategoria()
	{
		return $this->descripcion_categoria;
	}

	/**
	 * Get the [edad_min] column value.
	 * 
	 * @return     int
	 */
	public function getEdadMin()
	{
		return $this->edad_min;
	}

	/**
	 * Get the [edad_max] column value.
	 * 
	 * @return     int
	 */
	public function getEdadMax()
	{
		return $this->edad_max;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Categoria The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CategoriaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [descripcion_categoria] column.
	 * 
	 * @param      string $v new value
	 * @return     Categoria The current object (for fluent API support)
	 */
	public function setDescripcionCategoria($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descripcion_categoria !== $v) {
			$this->descripcion_categoria = $v;
			$this->modifiedColumns[] = CategoriaPeer::DESCRIPCION_CATEGORIA;
		}

		return $this;
	} // setDescripcionCategoria()

	/**
	 * Set the value of [edad_min] column.
	 * 
	 * @param      int $v new value
	 * @return     Categoria The current object (for fluent API support)
	 */
	public function setEdadMin($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->edad_min !== $v) {
			$this->edad_min = $v;
			$this->modifiedColumns[] = CategoriaPeer::EDAD_MIN;
		}

		return $this;
	} // setEdadMin()

	/**
	 * Set the value of [edad_max] column.
	 * 
	 * @param      int $v new value
	 * @return     Categoria The current object (for fluent API support)
	 */
	public function setEdadMax($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->edad_max !== $v) {
			$this->edad_max = $v;
			$this->modifiedColumns[] = CategoriaPeer::EDAD_MAX;
		}

		return $this;
	} // setEdadMax()

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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->descripcion_categoria = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->edad_min = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->edad_max = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = CategoriaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Categoria object", $e);
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
			$con = Propel::getConnection(CategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CategoriaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collRankings = null;

			$this->collTorneoCategorias = null;

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
			$con = Propel::getConnection(CategoriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = CategoriaQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCategoria:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseCategoria:delete:post') as $callable)
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
			$con = Propel::getConnection(CategoriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCategoria:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseCategoria:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				CategoriaPeer::addInstanceToPool($this);
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

			if ($this->rankingsScheduledForDeletion !== null) {
				if (!$this->rankingsScheduledForDeletion->isEmpty()) {
					RankingQuery::create()
						->filterByPrimaryKeys($this->rankingsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->rankingsScheduledForDeletion = null;
				}
			}

			if ($this->collRankings !== null) {
				foreach ($this->collRankings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->torneoCategoriasScheduledForDeletion !== null) {
				if (!$this->torneoCategoriasScheduledForDeletion->isEmpty()) {
					TorneoCategoriaQuery::create()
						->filterByPrimaryKeys($this->torneoCategoriasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->torneoCategoriasScheduledForDeletion = null;
				}
			}

			if ($this->collTorneoCategorias !== null) {
				foreach ($this->collTorneoCategorias as $referrerFK) {
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

		$this->modifiedColumns[] = CategoriaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . CategoriaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(CategoriaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(CategoriaPeer::DESCRIPCION_CATEGORIA)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRIPCION_CATEGORIA`';
		}
		if ($this->isColumnModified(CategoriaPeer::EDAD_MIN)) {
			$modifiedColumns[':p' . $index++]  = '`EDAD_MIN`';
		}
		if ($this->isColumnModified(CategoriaPeer::EDAD_MAX)) {
			$modifiedColumns[':p' . $index++]  = '`EDAD_MAX`';
		}

		$sql = sprintf(
			'INSERT INTO `categoria` (%s) VALUES (%s)',
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
					case '`DESCRIPCION_CATEGORIA`':
						$stmt->bindValue($identifier, $this->descripcion_categoria, PDO::PARAM_STR);
						break;
					case '`EDAD_MIN`':
						$stmt->bindValue($identifier, $this->edad_min, PDO::PARAM_INT);
						break;
					case '`EDAD_MAX`':
						$stmt->bindValue($identifier, $this->edad_max, PDO::PARAM_INT);
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


			if (($retval = CategoriaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRankings !== null) {
					foreach ($this->collRankings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTorneoCategorias !== null) {
					foreach ($this->collTorneoCategorias as $referrerFK) {
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
		$pos = CategoriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescripcionCategoria();
				break;
			case 2:
				return $this->getEdadMin();
				break;
			case 3:
				return $this->getEdadMax();
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
		if (isset($alreadyDumpedObjects['Categoria'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Categoria'][$this->getPrimaryKey()] = true;
		$keys = CategoriaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescripcionCategoria(),
			$keys[2] => $this->getEdadMin(),
			$keys[3] => $this->getEdadMax(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collRankings) {
				$result['Rankings'] = $this->collRankings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collTorneoCategorias) {
				$result['TorneoCategorias'] = $this->collTorneoCategorias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = CategoriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescripcionCategoria($value);
				break;
			case 2:
				$this->setEdadMin($value);
				break;
			case 3:
				$this->setEdadMax($value);
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
		$keys = CategoriaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescripcionCategoria($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEdadMin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEdadMax($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CategoriaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CategoriaPeer::ID)) $criteria->add(CategoriaPeer::ID, $this->id);
		if ($this->isColumnModified(CategoriaPeer::DESCRIPCION_CATEGORIA)) $criteria->add(CategoriaPeer::DESCRIPCION_CATEGORIA, $this->descripcion_categoria);
		if ($this->isColumnModified(CategoriaPeer::EDAD_MIN)) $criteria->add(CategoriaPeer::EDAD_MIN, $this->edad_min);
		if ($this->isColumnModified(CategoriaPeer::EDAD_MAX)) $criteria->add(CategoriaPeer::EDAD_MAX, $this->edad_max);

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
		$criteria = new Criteria(CategoriaPeer::DATABASE_NAME);
		$criteria->add(CategoriaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Categoria (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setDescripcionCategoria($this->getDescripcionCategoria());
		$copyObj->setEdadMin($this->getEdadMin());
		$copyObj->setEdadMax($this->getEdadMax());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getRankings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addRanking($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getTorneoCategorias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTorneoCategoria($relObj->copy($deepCopy));
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
	 * @return     Categoria Clone of current object.
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
	 * @return     CategoriaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CategoriaPeer();
		}
		return self::$peer;
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
		if ('Ranking' == $relationName) {
			return $this->initRankings();
		}
		if ('TorneoCategoria' == $relationName) {
			return $this->initTorneoCategorias();
		}
	}

	/**
	 * Clears out the collRankings collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addRankings()
	 */
	public function clearRankings()
	{
		$this->collRankings = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collRankings collection.
	 *
	 * By default this just sets the collRankings collection to an empty array (like clearcollRankings());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initRankings($overrideExisting = true)
	{
		if (null !== $this->collRankings && !$overrideExisting) {
			return;
		}
		$this->collRankings = new PropelObjectCollection();
		$this->collRankings->setModel('Ranking');
	}

	/**
	 * Gets an array of Ranking objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Categoria is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Ranking[] List of Ranking objects
	 * @throws     PropelException
	 */
	public function getRankings($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collRankings || null !== $criteria) {
			if ($this->isNew() && null === $this->collRankings) {
				// return empty collection
				$this->initRankings();
			} else {
				$collRankings = RankingQuery::create(null, $criteria)
					->filterByCategoria($this)
					->find($con);
				if (null !== $criteria) {
					return $collRankings;
				}
				$this->collRankings = $collRankings;
			}
		}
		return $this->collRankings;
	}

	/**
	 * Sets a collection of Ranking objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $rankings A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setRankings(PropelCollection $rankings, PropelPDO $con = null)
	{
		$this->rankingsScheduledForDeletion = $this->getRankings(new Criteria(), $con)->diff($rankings);

		foreach ($rankings as $ranking) {
			// Fix issue with collection modified by reference
			if ($ranking->isNew()) {
				$ranking->setCategoria($this);
			}
			$this->addRanking($ranking);
		}

		$this->collRankings = $rankings;
	}

	/**
	 * Returns the number of related Ranking objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Ranking objects.
	 * @throws     PropelException
	 */
	public function countRankings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collRankings || null !== $criteria) {
			if ($this->isNew() && null === $this->collRankings) {
				return 0;
			} else {
				$query = RankingQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCategoria($this)
					->count($con);
			}
		} else {
			return count($this->collRankings);
		}
	}

	/**
	 * Method called to associate a Ranking object to this object
	 * through the Ranking foreign key attribute.
	 *
	 * @param      Ranking $l Ranking
	 * @return     Categoria The current object (for fluent API support)
	 */
	public function addRanking(Ranking $l)
	{
		if ($this->collRankings === null) {
			$this->initRankings();
		}
		if (!$this->collRankings->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddRanking($l);
		}

		return $this;
	}

	/**
	 * @param	Ranking $ranking The ranking object to add.
	 */
	protected function doAddRanking($ranking)
	{
		$this->collRankings[]= $ranking;
		$ranking->setCategoria($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Categoria is new, it will return
	 * an empty collection; or if this Categoria has previously
	 * been saved, it will retrieve related Rankings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Categoria.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ranking[] List of Ranking objects
	 */
	public function getRankingsJoinInscripto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RankingQuery::create(null, $criteria);
		$query->joinWith('Inscripto', $join_behavior);

		return $this->getRankings($query, $con);
	}

	/**
	 * Clears out the collTorneoCategorias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTorneoCategorias()
	 */
	public function clearTorneoCategorias()
	{
		$this->collTorneoCategorias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTorneoCategorias collection.
	 *
	 * By default this just sets the collTorneoCategorias collection to an empty array (like clearcollTorneoCategorias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initTorneoCategorias($overrideExisting = true)
	{
		if (null !== $this->collTorneoCategorias && !$overrideExisting) {
			return;
		}
		$this->collTorneoCategorias = new PropelObjectCollection();
		$this->collTorneoCategorias->setModel('TorneoCategoria');
	}

	/**
	 * Gets an array of TorneoCategoria objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Categoria is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array TorneoCategoria[] List of TorneoCategoria objects
	 * @throws     PropelException
	 */
	public function getTorneoCategorias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTorneoCategorias || null !== $criteria) {
			if ($this->isNew() && null === $this->collTorneoCategorias) {
				// return empty collection
				$this->initTorneoCategorias();
			} else {
				$collTorneoCategorias = TorneoCategoriaQuery::create(null, $criteria)
					->filterByCategoria($this)
					->find($con);
				if (null !== $criteria) {
					return $collTorneoCategorias;
				}
				$this->collTorneoCategorias = $collTorneoCategorias;
			}
		}
		return $this->collTorneoCategorias;
	}

	/**
	 * Sets a collection of TorneoCategoria objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $torneoCategorias A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setTorneoCategorias(PropelCollection $torneoCategorias, PropelPDO $con = null)
	{
		$this->torneoCategoriasScheduledForDeletion = $this->getTorneoCategorias(new Criteria(), $con)->diff($torneoCategorias);

		foreach ($torneoCategorias as $torneoCategoria) {
			// Fix issue with collection modified by reference
			if ($torneoCategoria->isNew()) {
				$torneoCategoria->setCategoria($this);
			}
			$this->addTorneoCategoria($torneoCategoria);
		}

		$this->collTorneoCategorias = $torneoCategorias;
	}

	/**
	 * Returns the number of related TorneoCategoria objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related TorneoCategoria objects.
	 * @throws     PropelException
	 */
	public function countTorneoCategorias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTorneoCategorias || null !== $criteria) {
			if ($this->isNew() && null === $this->collTorneoCategorias) {
				return 0;
			} else {
				$query = TorneoCategoriaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCategoria($this)
					->count($con);
			}
		} else {
			return count($this->collTorneoCategorias);
		}
	}

	/**
	 * Method called to associate a TorneoCategoria object to this object
	 * through the TorneoCategoria foreign key attribute.
	 *
	 * @param      TorneoCategoria $l TorneoCategoria
	 * @return     Categoria The current object (for fluent API support)
	 */
	public function addTorneoCategoria(TorneoCategoria $l)
	{
		if ($this->collTorneoCategorias === null) {
			$this->initTorneoCategorias();
		}
		if (!$this->collTorneoCategorias->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddTorneoCategoria($l);
		}

		return $this;
	}

	/**
	 * @param	TorneoCategoria $torneoCategoria The torneoCategoria object to add.
	 */
	protected function doAddTorneoCategoria($torneoCategoria)
	{
		$this->collTorneoCategorias[]= $torneoCategoria;
		$torneoCategoria->setCategoria($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Categoria is new, it will return
	 * an empty collection; or if this Categoria has previously
	 * been saved, it will retrieve related TorneoCategorias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Categoria.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array TorneoCategoria[] List of TorneoCategoria objects
	 */
	public function getTorneoCategoriasJoinTorneo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = TorneoCategoriaQuery::create(null, $criteria);
		$query->joinWith('Torneo', $join_behavior);

		return $this->getTorneoCategorias($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->descripcion_categoria = null;
		$this->edad_min = null;
		$this->edad_max = null;
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
			if ($this->collRankings) {
				foreach ($this->collRankings as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collTorneoCategorias) {
				foreach ($this->collTorneoCategorias as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collRankings instanceof PropelCollection) {
			$this->collRankings->clearIterator();
		}
		$this->collRankings = null;
		if ($this->collTorneoCategorias instanceof PropelCollection) {
			$this->collTorneoCategorias->clearIterator();
		}
		$this->collTorneoCategorias = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(CategoriaPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseCategoria:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseCategoria
