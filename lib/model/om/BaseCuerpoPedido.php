<?php


/**
 * Base class that represents a row from the 'cuerpo_pedido' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCuerpoPedido extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CuerpoPedidoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CuerpoPedidoPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the encabezado_pedido_id field.
	 * @var        int
	 */
	protected $encabezado_pedido_id;

	/**
	 * The value for the producto_id field.
	 * @var        int
	 */
	protected $producto_id;

	/**
	 * The value for the cantidad field.
	 * @var        int
	 */
	protected $cantidad;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * @var        EncabezadoPedido
	 */
	protected $aEncabezadoPedido;

	/**
	 * @var        Producto
	 */
	protected $aProducto;

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
	 * Get the [encabezado_pedido_id] column value.
	 * 
	 * @return     int
	 */
	public function getEncabezadoPedidoId()
	{
		return $this->encabezado_pedido_id;
	}

	/**
	 * Get the [producto_id] column value.
	 * 
	 * @return     int
	 */
	public function getProductoId()
	{
		return $this->producto_id;
	}

	/**
	 * Get the [cantidad] column value.
	 * 
	 * @return     int
	 */
	public function getCantidad()
	{
		return $this->cantidad;
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
	 * Set the value of [encabezado_pedido_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CuerpoPedido The current object (for fluent API support)
	 */
	public function setEncabezadoPedidoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->encabezado_pedido_id !== $v) {
			$this->encabezado_pedido_id = $v;
			$this->modifiedColumns[] = CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID;
		}

		if ($this->aEncabezadoPedido !== null && $this->aEncabezadoPedido->getId() !== $v) {
			$this->aEncabezadoPedido = null;
		}

		return $this;
	} // setEncabezadoPedidoId()

	/**
	 * Set the value of [producto_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CuerpoPedido The current object (for fluent API support)
	 */
	public function setProductoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->producto_id !== $v) {
			$this->producto_id = $v;
			$this->modifiedColumns[] = CuerpoPedidoPeer::PRODUCTO_ID;
		}

		if ($this->aProducto !== null && $this->aProducto->getId() !== $v) {
			$this->aProducto = null;
		}

		return $this;
	} // setProductoId()

	/**
	 * Set the value of [cantidad] column.
	 * 
	 * @param      int $v new value
	 * @return     CuerpoPedido The current object (for fluent API support)
	 */
	public function setCantidad($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = CuerpoPedidoPeer::CANTIDAD;
		}

		return $this;
	} // setCantidad()

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     CuerpoPedido The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CuerpoPedidoPeer::ID;
		}

		return $this;
	} // setId()

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

			$this->encabezado_pedido_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->producto_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->cantidad = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = CuerpoPedidoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating CuerpoPedido object", $e);
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

		if ($this->aEncabezadoPedido !== null && $this->encabezado_pedido_id !== $this->aEncabezadoPedido->getId()) {
			$this->aEncabezadoPedido = null;
		}
		if ($this->aProducto !== null && $this->producto_id !== $this->aProducto->getId()) {
			$this->aProducto = null;
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
			$con = Propel::getConnection(CuerpoPedidoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CuerpoPedidoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aEncabezadoPedido = null;
			$this->aProducto = null;
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
			$con = Propel::getConnection(CuerpoPedidoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = CuerpoPedidoQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCuerpoPedido:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseCuerpoPedido:delete:post') as $callable)
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
			$con = Propel::getConnection(CuerpoPedidoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCuerpoPedido:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseCuerpoPedido:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				CuerpoPedidoPeer::addInstanceToPool($this);
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

			if ($this->aEncabezadoPedido !== null) {
				if ($this->aEncabezadoPedido->isModified() || $this->aEncabezadoPedido->isNew()) {
					$affectedRows += $this->aEncabezadoPedido->save($con);
				}
				$this->setEncabezadoPedido($this->aEncabezadoPedido);
			}

			if ($this->aProducto !== null) {
				if ($this->aProducto->isModified() || $this->aProducto->isNew()) {
					$affectedRows += $this->aProducto->save($con);
				}
				$this->setProducto($this->aProducto);
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

		$this->modifiedColumns[] = CuerpoPedidoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . CuerpoPedidoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ENCABEZADO_PEDIDO_ID`';
		}
		if ($this->isColumnModified(CuerpoPedidoPeer::PRODUCTO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PRODUCTO_ID`';
		}
		if ($this->isColumnModified(CuerpoPedidoPeer::CANTIDAD)) {
			$modifiedColumns[':p' . $index++]  = '`CANTIDAD`';
		}
		if ($this->isColumnModified(CuerpoPedidoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}

		$sql = sprintf(
			'INSERT INTO `cuerpo_pedido` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ENCABEZADO_PEDIDO_ID`':
						$stmt->bindValue($identifier, $this->encabezado_pedido_id, PDO::PARAM_INT);
						break;
					case '`PRODUCTO_ID`':
						$stmt->bindValue($identifier, $this->producto_id, PDO::PARAM_INT);
						break;
					case '`CANTIDAD`':
						$stmt->bindValue($identifier, $this->cantidad, PDO::PARAM_INT);
						break;
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
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

			if ($this->aEncabezadoPedido !== null) {
				if (!$this->aEncabezadoPedido->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEncabezadoPedido->getValidationFailures());
				}
			}

			if ($this->aProducto !== null) {
				if (!$this->aProducto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProducto->getValidationFailures());
				}
			}


			if (($retval = CuerpoPedidoPeer::doValidate($this, $columns)) !== true) {
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
		$pos = CuerpoPedidoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEncabezadoPedidoId();
				break;
			case 1:
				return $this->getProductoId();
				break;
			case 2:
				return $this->getCantidad();
				break;
			case 3:
				return $this->getId();
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
		if (isset($alreadyDumpedObjects['CuerpoPedido'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['CuerpoPedido'][$this->getPrimaryKey()] = true;
		$keys = CuerpoPedidoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEncabezadoPedidoId(),
			$keys[1] => $this->getProductoId(),
			$keys[2] => $this->getCantidad(),
			$keys[3] => $this->getId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aEncabezadoPedido) {
				$result['EncabezadoPedido'] = $this->aEncabezadoPedido->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aProducto) {
				$result['Producto'] = $this->aProducto->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = CuerpoPedidoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEncabezadoPedidoId($value);
				break;
			case 1:
				$this->setProductoId($value);
				break;
			case 2:
				$this->setCantidad($value);
				break;
			case 3:
				$this->setId($value);
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
		$keys = CuerpoPedidoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEncabezadoPedidoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setProductoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantidad($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CuerpoPedidoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID)) $criteria->add(CuerpoPedidoPeer::ENCABEZADO_PEDIDO_ID, $this->encabezado_pedido_id);
		if ($this->isColumnModified(CuerpoPedidoPeer::PRODUCTO_ID)) $criteria->add(CuerpoPedidoPeer::PRODUCTO_ID, $this->producto_id);
		if ($this->isColumnModified(CuerpoPedidoPeer::CANTIDAD)) $criteria->add(CuerpoPedidoPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(CuerpoPedidoPeer::ID)) $criteria->add(CuerpoPedidoPeer::ID, $this->id);

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
		$criteria = new Criteria(CuerpoPedidoPeer::DATABASE_NAME);
		$criteria->add(CuerpoPedidoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of CuerpoPedido (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setEncabezadoPedidoId($this->getEncabezadoPedidoId());
		$copyObj->setProductoId($this->getProductoId());
		$copyObj->setCantidad($this->getCantidad());

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
	 * @return     CuerpoPedido Clone of current object.
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
	 * @return     CuerpoPedidoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CuerpoPedidoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a EncabezadoPedido object.
	 *
	 * @param      EncabezadoPedido $v
	 * @return     CuerpoPedido The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setEncabezadoPedido(EncabezadoPedido $v = null)
	{
		if ($v === null) {
			$this->setEncabezadoPedidoId(NULL);
		} else {
			$this->setEncabezadoPedidoId($v->getId());
		}

		$this->aEncabezadoPedido = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the EncabezadoPedido object, it will not be re-added.
		if ($v !== null) {
			$v->addCuerpoPedido($this);
		}

		return $this;
	}


	/**
	 * Get the associated EncabezadoPedido object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     EncabezadoPedido The associated EncabezadoPedido object.
	 * @throws     PropelException
	 */
	public function getEncabezadoPedido(PropelPDO $con = null)
	{
		if ($this->aEncabezadoPedido === null && ($this->encabezado_pedido_id !== null)) {
			$this->aEncabezadoPedido = EncabezadoPedidoQuery::create()->findPk($this->encabezado_pedido_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aEncabezadoPedido->addCuerpoPedidos($this);
			 */
		}
		return $this->aEncabezadoPedido;
	}

	/**
	 * Declares an association between this object and a Producto object.
	 *
	 * @param      Producto $v
	 * @return     CuerpoPedido The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProducto(Producto $v = null)
	{
		if ($v === null) {
			$this->setProductoId(NULL);
		} else {
			$this->setProductoId($v->getId());
		}

		$this->aProducto = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Producto object, it will not be re-added.
		if ($v !== null) {
			$v->addCuerpoPedido($this);
		}

		return $this;
	}


	/**
	 * Get the associated Producto object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Producto The associated Producto object.
	 * @throws     PropelException
	 */
	public function getProducto(PropelPDO $con = null)
	{
		if ($this->aProducto === null && ($this->producto_id !== null)) {
			$this->aProducto = ProductoQuery::create()->findPk($this->producto_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aProducto->addCuerpoPedidos($this);
			 */
		}
		return $this->aProducto;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->encabezado_pedido_id = null;
		$this->producto_id = null;
		$this->cantidad = null;
		$this->id = null;
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

		$this->aEncabezadoPedido = null;
		$this->aProducto = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(CuerpoPedidoPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseCuerpoPedido:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseCuerpoPedido