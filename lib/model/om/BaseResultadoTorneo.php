<?php


/**
 * Base class that represents a row from the 'resultado_torneo' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseResultadoTorneo extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ResultadoTorneoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ResultadoTorneoPeer
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
	 * The value for the puesto_id field.
	 * @var        int
	 */
	protected $puesto_id;

	/**
	 * The value for the torneo_cat_id field.
	 * @var        int
	 */
	protected $torneo_cat_id;

	/**
	 * The value for the pelotari_nro_doc field.
	 * @var        int
	 */
	protected $pelotari_nro_doc;

	/**
	 * @var        PuntosPuesto
	 */
	protected $aPuntosPuesto;

	/**
	 * @var        TorneoCategoria
	 */
	protected $aTorneoCategoria;

	/**
	 * @var        Inscripto
	 */
	protected $aInscripto;

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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [puesto_id] column value.
	 * 
	 * @return     int
	 */
	public function getPuestoId()
	{
		return $this->puesto_id;
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
	 * Get the [pelotari_nro_doc] column value.
	 * 
	 * @return     int
	 */
	public function getPelotariNroDoc()
	{
		return $this->pelotari_nro_doc;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ResultadoTorneo The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ResultadoTorneoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [puesto_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ResultadoTorneo The current object (for fluent API support)
	 */
	public function setPuestoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->puesto_id !== $v) {
			$this->puesto_id = $v;
			$this->modifiedColumns[] = ResultadoTorneoPeer::PUESTO_ID;
		}

		if ($this->aPuntosPuesto !== null && $this->aPuntosPuesto->getId() !== $v) {
			$this->aPuntosPuesto = null;
		}

		return $this;
	} // setPuestoId()

	/**
	 * Set the value of [torneo_cat_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ResultadoTorneo The current object (for fluent API support)
	 */
	public function setTorneoCatId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->torneo_cat_id !== $v) {
			$this->torneo_cat_id = $v;
			$this->modifiedColumns[] = ResultadoTorneoPeer::TORNEO_CAT_ID;
		}

		if ($this->aTorneoCategoria !== null && $this->aTorneoCategoria->getIdTorneoCategoria() !== $v) {
			$this->aTorneoCategoria = null;
		}

		return $this;
	} // setTorneoCatId()

	/**
	 * Set the value of [pelotari_nro_doc] column.
	 * 
	 * @param      int $v new value
	 * @return     ResultadoTorneo The current object (for fluent API support)
	 */
	public function setPelotariNroDoc($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pelotari_nro_doc !== $v) {
			$this->pelotari_nro_doc = $v;
			$this->modifiedColumns[] = ResultadoTorneoPeer::PELOTARI_NRO_DOC;
		}

		if ($this->aInscripto !== null && $this->aInscripto->getPersonaNroDoc() !== $v) {
			$this->aInscripto = null;
		}

		return $this;
	} // setPelotariNroDoc()

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
			$this->puesto_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->torneo_cat_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->pelotari_nro_doc = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = ResultadoTorneoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating ResultadoTorneo object", $e);
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

		if ($this->aPuntosPuesto !== null && $this->puesto_id !== $this->aPuntosPuesto->getId()) {
			$this->aPuntosPuesto = null;
		}
		if ($this->aTorneoCategoria !== null && $this->torneo_cat_id !== $this->aTorneoCategoria->getIdTorneoCategoria()) {
			$this->aTorneoCategoria = null;
		}
		if ($this->aInscripto !== null && $this->pelotari_nro_doc !== $this->aInscripto->getPersonaNroDoc()) {
			$this->aInscripto = null;
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
			$con = Propel::getConnection(ResultadoTorneoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ResultadoTorneoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aPuntosPuesto = null;
			$this->aTorneoCategoria = null;
			$this->aInscripto = null;
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
			$con = Propel::getConnection(ResultadoTorneoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ResultadoTorneoQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseResultadoTorneo:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseResultadoTorneo:delete:post') as $callable)
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
			$con = Propel::getConnection(ResultadoTorneoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseResultadoTorneo:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseResultadoTorneo:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ResultadoTorneoPeer::addInstanceToPool($this);
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

			if ($this->aPuntosPuesto !== null) {
				if ($this->aPuntosPuesto->isModified() || $this->aPuntosPuesto->isNew()) {
					$affectedRows += $this->aPuntosPuesto->save($con);
				}
				$this->setPuntosPuesto($this->aPuntosPuesto);
			}

			if ($this->aTorneoCategoria !== null) {
				if ($this->aTorneoCategoria->isModified() || $this->aTorneoCategoria->isNew()) {
					$affectedRows += $this->aTorneoCategoria->save($con);
				}
				$this->setTorneoCategoria($this->aTorneoCategoria);
			}

			if ($this->aInscripto !== null) {
				if ($this->aInscripto->isModified() || $this->aInscripto->isNew()) {
					$affectedRows += $this->aInscripto->save($con);
				}
				$this->setInscripto($this->aInscripto);
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

		$this->modifiedColumns[] = ResultadoTorneoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ResultadoTorneoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ResultadoTorneoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ResultadoTorneoPeer::PUESTO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PUESTO_ID`';
		}
		if ($this->isColumnModified(ResultadoTorneoPeer::TORNEO_CAT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`TORNEO_CAT_ID`';
		}
		if ($this->isColumnModified(ResultadoTorneoPeer::PELOTARI_NRO_DOC)) {
			$modifiedColumns[':p' . $index++]  = '`PELOTARI_NRO_DOC`';
		}

		$sql = sprintf(
			'INSERT INTO `resultado_torneo` (%s) VALUES (%s)',
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
					case '`PUESTO_ID`':
						$stmt->bindValue($identifier, $this->puesto_id, PDO::PARAM_INT);
						break;
					case '`TORNEO_CAT_ID`':
						$stmt->bindValue($identifier, $this->torneo_cat_id, PDO::PARAM_INT);
						break;
					case '`PELOTARI_NRO_DOC`':
						$stmt->bindValue($identifier, $this->pelotari_nro_doc, PDO::PARAM_INT);
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

			if ($this->aPuntosPuesto !== null) {
				if (!$this->aPuntosPuesto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPuntosPuesto->getValidationFailures());
				}
			}

			if ($this->aTorneoCategoria !== null) {
				if (!$this->aTorneoCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTorneoCategoria->getValidationFailures());
				}
			}

			if ($this->aInscripto !== null) {
				if (!$this->aInscripto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInscripto->getValidationFailures());
				}
			}


			if (($retval = ResultadoTorneoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = ResultadoTorneoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPuestoId();
				break;
			case 2:
				return $this->getTorneoCatId();
				break;
			case 3:
				return $this->getPelotariNroDoc();
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
		if (isset($alreadyDumpedObjects['ResultadoTorneo'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['ResultadoTorneo'][$this->getPrimaryKey()] = true;
		$keys = ResultadoTorneoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPuestoId(),
			$keys[2] => $this->getTorneoCatId(),
			$keys[3] => $this->getPelotariNroDoc(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aPuntosPuesto) {
				$result['PuntosPuesto'] = $this->aPuntosPuesto->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aTorneoCategoria) {
				$result['TorneoCategoria'] = $this->aTorneoCategoria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aInscripto) {
				$result['Inscripto'] = $this->aInscripto->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = ResultadoTorneoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPuestoId($value);
				break;
			case 2:
				$this->setTorneoCatId($value);
				break;
			case 3:
				$this->setPelotariNroDoc($value);
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
		$keys = ResultadoTorneoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPuestoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTorneoCatId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPelotariNroDoc($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ResultadoTorneoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ResultadoTorneoPeer::ID)) $criteria->add(ResultadoTorneoPeer::ID, $this->id);
		if ($this->isColumnModified(ResultadoTorneoPeer::PUESTO_ID)) $criteria->add(ResultadoTorneoPeer::PUESTO_ID, $this->puesto_id);
		if ($this->isColumnModified(ResultadoTorneoPeer::TORNEO_CAT_ID)) $criteria->add(ResultadoTorneoPeer::TORNEO_CAT_ID, $this->torneo_cat_id);
		if ($this->isColumnModified(ResultadoTorneoPeer::PELOTARI_NRO_DOC)) $criteria->add(ResultadoTorneoPeer::PELOTARI_NRO_DOC, $this->pelotari_nro_doc);

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
		$criteria = new Criteria(ResultadoTorneoPeer::DATABASE_NAME);
		$criteria->add(ResultadoTorneoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ResultadoTorneo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setPuestoId($this->getPuestoId());
		$copyObj->setTorneoCatId($this->getTorneoCatId());
		$copyObj->setPelotariNroDoc($this->getPelotariNroDoc());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

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
	 * @return     ResultadoTorneo Clone of current object.
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
	 * @return     ResultadoTorneoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ResultadoTorneoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a PuntosPuesto object.
	 *
	 * @param      PuntosPuesto $v
	 * @return     ResultadoTorneo The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPuntosPuesto(PuntosPuesto $v = null)
	{
		if ($v === null) {
			$this->setPuestoId(NULL);
		} else {
			$this->setPuestoId($v->getId());
		}

		$this->aPuntosPuesto = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the PuntosPuesto object, it will not be re-added.
		if ($v !== null) {
			$v->addResultadoTorneo($this);
		}

		return $this;
	}


	/**
	 * Get the associated PuntosPuesto object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     PuntosPuesto The associated PuntosPuesto object.
	 * @throws     PropelException
	 */
	public function getPuntosPuesto(PropelPDO $con = null)
	{
		if ($this->aPuntosPuesto === null && ($this->puesto_id !== null)) {
			$this->aPuntosPuesto = PuntosPuestoQuery::create()->findPk($this->puesto_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPuntosPuesto->addResultadoTorneos($this);
			 */
		}
		return $this->aPuntosPuesto;
	}

	/**
	 * Declares an association between this object and a TorneoCategoria object.
	 *
	 * @param      TorneoCategoria $v
	 * @return     ResultadoTorneo The current object (for fluent API support)
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
			$v->addResultadoTorneo($this);
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
				$this->aTorneoCategoria->addResultadoTorneos($this);
			 */
		}
		return $this->aTorneoCategoria;
	}

	/**
	 * Declares an association between this object and a Inscripto object.
	 *
	 * @param      Inscripto $v
	 * @return     ResultadoTorneo The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setInscripto(Inscripto $v = null)
	{
		if ($v === null) {
			$this->setPelotariNroDoc(NULL);
		} else {
			$this->setPelotariNroDoc($v->getPersonaNroDoc());
		}

		$this->aInscripto = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Inscripto object, it will not be re-added.
		if ($v !== null) {
			$v->addResultadoTorneo($this);
		}

		return $this;
	}


	/**
	 * Get the associated Inscripto object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Inscripto The associated Inscripto object.
	 * @throws     PropelException
	 */
	public function getInscripto(PropelPDO $con = null)
	{
		if ($this->aInscripto === null && ($this->pelotari_nro_doc !== null)) {
			$this->aInscripto = InscriptoQuery::create()
				->filterByResultadoTorneo($this) // here
				->findOne($con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aInscripto->addResultadoTorneos($this);
			 */
		}
		return $this->aInscripto;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->puesto_id = null;
		$this->torneo_cat_id = null;
		$this->pelotari_nro_doc = null;
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
		} // if ($deep)

		$this->aPuntosPuesto = null;
		$this->aTorneoCategoria = null;
		$this->aInscripto = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ResultadoTorneoPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseResultadoTorneo:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseResultadoTorneo
