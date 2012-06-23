<?php


/**
 * Base class that represents a row from the 'ranking' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRanking extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RankingPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RankingPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the pelotari_nro_doc field.
	 * @var        int
	 */
	protected $pelotari_nro_doc;

	/**
	 * The value for the tipo_ranking field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $tipo_ranking;

	/**
	 * The value for the categoria_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $categoria_id;

	/**
	 * The value for the pelotari_puntos field.
	 * @var        int
	 */
	protected $pelotari_puntos;

	/**
	 * @var        Categoria
	 */
	protected $aCategoria;

	/**
	 * @var        array Inscripto[] Collection to store aggregation of Inscripto objects.
	 */
	protected $collInscriptos;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->tipo_ranking = false;
		$this->categoria_id = 0;
	}

	/**
	 * Initializes internal state of BaseRanking object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [pelotari_nro_doc] column value.
	 * 
	 * @return     int
	 */
	public function getPelotariNroDoc()
	{
		return $this->pelotari_nro_doc;
	}

	/**
	 * Get the [tipo_ranking] column value.
	 * 
	 * @return     boolean
	 */
	public function getTipoRanking()
	{
		return $this->tipo_ranking;
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
	 * Get the [pelotari_puntos] column value.
	 * 
	 * @return     int
	 */
	public function getPelotariPuntos()
	{
		return $this->pelotari_puntos;
	}

	/**
	 * Set the value of [pelotari_nro_doc] column.
	 * 
	 * @param      int $v new value
	 * @return     Ranking The current object (for fluent API support)
	 */
	public function setPelotariNroDoc($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pelotari_nro_doc !== $v) {
			$this->pelotari_nro_doc = $v;
			$this->modifiedColumns[] = RankingPeer::PELOTARI_NRO_DOC;
		}

		return $this;
	} // setPelotariNroDoc()

	/**
	 * Sets the value of the [tipo_ranking] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Ranking The current object (for fluent API support)
	 */
	public function setTipoRanking($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->tipo_ranking !== $v) {
			$this->tipo_ranking = $v;
			$this->modifiedColumns[] = RankingPeer::TIPO_RANKING;
		}

		return $this;
	} // setTipoRanking()

	/**
	 * Set the value of [categoria_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Ranking The current object (for fluent API support)
	 */
	public function setCategoriaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->categoria_id !== $v) {
			$this->categoria_id = $v;
			$this->modifiedColumns[] = RankingPeer::CATEGORIA_ID;
		}

		if ($this->aCategoria !== null && $this->aCategoria->getId() !== $v) {
			$this->aCategoria = null;
		}

		return $this;
	} // setCategoriaId()

	/**
	 * Set the value of [pelotari_puntos] column.
	 * 
	 * @param      int $v new value
	 * @return     Ranking The current object (for fluent API support)
	 */
	public function setPelotariPuntos($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pelotari_puntos !== $v) {
			$this->pelotari_puntos = $v;
			$this->modifiedColumns[] = RankingPeer::PELOTARI_PUNTOS;
		}

		return $this;
	} // setPelotariPuntos()

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
			if ($this->tipo_ranking !== false) {
				return false;
			}

			if ($this->categoria_id !== 0) {
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

			$this->pelotari_nro_doc = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->tipo_ranking = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
			$this->categoria_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->pelotari_puntos = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = RankingPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Ranking object", $e);
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
			$con = Propel::getConnection(RankingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RankingPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCategoria = null;
			$this->collInscriptos = null;

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
			$con = Propel::getConnection(RankingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RankingQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseRanking:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseRanking:delete:post') as $callable)
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
			$con = Propel::getConnection(RankingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseRanking:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseRanking:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				RankingPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = RankingPeer::PELOTARI_NRO_DOC;
		if (null !== $this->pelotari_nro_doc) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . RankingPeer::PELOTARI_NRO_DOC . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RankingPeer::PELOTARI_NRO_DOC)) {
			$modifiedColumns[':p' . $index++]  = '`PELOTARI_NRO_DOC`';
		}
		if ($this->isColumnModified(RankingPeer::TIPO_RANKING)) {
			$modifiedColumns[':p' . $index++]  = '`TIPO_RANKING`';
		}
		if ($this->isColumnModified(RankingPeer::CATEGORIA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CATEGORIA_ID`';
		}
		if ($this->isColumnModified(RankingPeer::PELOTARI_PUNTOS)) {
			$modifiedColumns[':p' . $index++]  = '`PELOTARI_PUNTOS`';
		}

		$sql = sprintf(
			'INSERT INTO `ranking` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`PELOTARI_NRO_DOC`':
						$stmt->bindValue($identifier, $this->pelotari_nro_doc, PDO::PARAM_INT);
						break;
					case '`TIPO_RANKING`':
						$stmt->bindValue($identifier, (int) $this->tipo_ranking, PDO::PARAM_INT);
						break;
					case '`CATEGORIA_ID`':
						$stmt->bindValue($identifier, $this->categoria_id, PDO::PARAM_INT);
						break;
					case '`PELOTARI_PUNTOS`':
						$stmt->bindValue($identifier, $this->pelotari_puntos, PDO::PARAM_INT);
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
		$this->setPelotariNroDoc($pk);

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

			if ($this->aCategoria !== null) {
				if (!$this->aCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategoria->getValidationFailures());
				}
			}


			if (($retval = RankingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInscriptos !== null) {
					foreach ($this->collInscriptos as $referrerFK) {
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
		$pos = RankingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPelotariNroDoc();
				break;
			case 1:
				return $this->getTipoRanking();
				break;
			case 2:
				return $this->getCategoriaId();
				break;
			case 3:
				return $this->getPelotariPuntos();
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
		if (isset($alreadyDumpedObjects['Ranking'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Ranking'][serialize($this->getPrimaryKey())] = true;
		$keys = RankingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPelotariNroDoc(),
			$keys[1] => $this->getTipoRanking(),
			$keys[2] => $this->getCategoriaId(),
			$keys[3] => $this->getPelotariPuntos(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCategoria) {
				$result['Categoria'] = $this->aCategoria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collInscriptos) {
				$result['Inscriptos'] = $this->collInscriptos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = RankingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPelotariNroDoc($value);
				break;
			case 1:
				$this->setTipoRanking($value);
				break;
			case 2:
				$this->setCategoriaId($value);
				break;
			case 3:
				$this->setPelotariPuntos($value);
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
		$keys = RankingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPelotariNroDoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipoRanking($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCategoriaId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPelotariPuntos($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RankingPeer::DATABASE_NAME);

		if ($this->isColumnModified(RankingPeer::PELOTARI_NRO_DOC)) $criteria->add(RankingPeer::PELOTARI_NRO_DOC, $this->pelotari_nro_doc);
		if ($this->isColumnModified(RankingPeer::TIPO_RANKING)) $criteria->add(RankingPeer::TIPO_RANKING, $this->tipo_ranking);
		if ($this->isColumnModified(RankingPeer::CATEGORIA_ID)) $criteria->add(RankingPeer::CATEGORIA_ID, $this->categoria_id);
		if ($this->isColumnModified(RankingPeer::PELOTARI_PUNTOS)) $criteria->add(RankingPeer::PELOTARI_PUNTOS, $this->pelotari_puntos);

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
		$criteria = new Criteria(RankingPeer::DATABASE_NAME);
		$criteria->add(RankingPeer::PELOTARI_NRO_DOC, $this->pelotari_nro_doc);
		$criteria->add(RankingPeer::TIPO_RANKING, $this->tipo_ranking);
		$criteria->add(RankingPeer::CATEGORIA_ID, $this->categoria_id);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();
		$pks[0] = $this->getPelotariNroDoc();
		$pks[1] = $this->getTipoRanking();
		$pks[2] = $this->getCategoriaId();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{
		$this->setPelotariNroDoc($keys[0]);
		$this->setTipoRanking($keys[1]);
		$this->setCategoriaId($keys[2]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getPelotariNroDoc()) && (null === $this->getTipoRanking()) && (null === $this->getCategoriaId());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Ranking (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setTipoRanking($this->getTipoRanking());
		$copyObj->setCategoriaId($this->getCategoriaId());
		$copyObj->setPelotariPuntos($this->getPelotariPuntos());

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

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setPelotariNroDoc(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Ranking Clone of current object.
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
	 * @return     RankingPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RankingPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Categoria object.
	 *
	 * @param      Categoria $v
	 * @return     Ranking The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCategoria(Categoria $v = null)
	{
		if ($v === null) {
			$this->setCategoriaId(0);
		} else {
			$this->setCategoriaId($v->getId());
		}

		$this->aCategoria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Categoria object, it will not be re-added.
		if ($v !== null) {
			$v->addRanking($this);
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
				$this->aCategoria->addRankings($this);
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
	 * If this Ranking is new, it will return
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
					->filterByRanking($this)
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
				$inscripto->setRanking($this);
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
					->filterByRanking($this)
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
	 * @return     Ranking The current object (for fluent API support)
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
		$inscripto->setRanking($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Ranking is new, it will return
	 * an empty collection; or if this Ranking has previously
	 * been saved, it will retrieve related Inscriptos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Ranking.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Inscripto[] List of Inscripto objects
	 */
	public function getInscriptosJoinTorneoCategoria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = InscriptoQuery::create(null, $criteria);
		$query->joinWith('TorneoCategoria', $join_behavior);

		return $this->getInscriptos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Ranking is new, it will return
	 * an empty collection; or if this Ranking has previously
	 * been saved, it will retrieve related Inscriptos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Ranking.
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
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->pelotari_nro_doc = null;
		$this->tipo_ranking = null;
		$this->categoria_id = null;
		$this->pelotari_puntos = null;
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
			if ($this->collInscriptos) {
				foreach ($this->collInscriptos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collInscriptos instanceof PropelCollection) {
			$this->collInscriptos->clearIterator();
		}
		$this->collInscriptos = null;
		$this->aCategoria = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(RankingPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseRanking:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseRanking
