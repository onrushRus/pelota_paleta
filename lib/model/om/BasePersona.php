<?php


/**
 * Base class that represents a row from the 'persona' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePersona extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PersonaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PersonaPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the nro_doc field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $nro_doc;

	/**
	 * The value for the nom_apellido field.
	 * @var        string
	 */
	protected $nom_apellido;

	/**
	 * The value for the apellido field.
	 * @var        string
	 */
	protected $apellido;

	/**
	 * The value for the fecha_nacimiento field.
	 * @var        string
	 */
	protected $fecha_nacimiento;

	/**
	 * The value for the e_mail field.
	 * @var        string
	 */
	protected $e_mail;

	/**
	 * The value for the localidad_id field.
	 * @var        int
	 */
	protected $localidad_id;

	/**
	 * @var        Localidad
	 */
	protected $aLocalidad;

	/**
	 * @var        array Direccion[] Collection to store aggregation of Direccion objects.
	 */
	protected $collDireccions;

	/**
	 * @var        array Inscripto[] Collection to store aggregation of Inscripto objects.
	 */
	protected $collInscriptos;

	/**
	 * @var        Socio one-to-one related Socio object
	 */
	protected $singleSocio;

	/**
	 * @var        array Telefono[] Collection to store aggregation of Telefono objects.
	 */
	protected $collTelefonos;

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
	protected $direccionsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $inscriptosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $sociosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $telefonosScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->nro_doc = 0;
	}

	/**
	 * Initializes internal state of BasePersona object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [nro_doc] column value.
	 * 
	 * @return     int
	 */
	public function getNroDoc()
	{
		return $this->nro_doc;
	}

	/**
	 * Get the [nom_apellido] column value.
	 * 
	 * @return     string
	 */
	public function getNomApellido()
	{
		return $this->nom_apellido;
	}

	/**
	 * Get the [apellido] column value.
	 * 
	 * @return     string
	 */
	public function getApellido()
	{
		return $this->apellido;
	}

	/**
	 * Get the [optionally formatted] temporal [fecha_nacimiento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFechaNacimiento($format = 'Y-m-d')
	{
		if ($this->fecha_nacimiento === null) {
			return null;
		}


		if ($this->fecha_nacimiento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_nacimiento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_nacimiento, true), $x);
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
	 * Get the [e_mail] column value.
	 * 
	 * @return     string
	 */
	public function getEMail()
	{
		return $this->e_mail;
	}

	/**
	 * Get the [localidad_id] column value.
	 * 
	 * @return     int
	 */
	public function getLocalidadId()
	{
		return $this->localidad_id;
	}

	/**
	 * Set the value of [nro_doc] column.
	 * 
	 * @param      int $v new value
	 * @return     Persona The current object (for fluent API support)
	 */
	public function setNroDoc($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->nro_doc !== $v) {
			$this->nro_doc = $v;
			$this->modifiedColumns[] = PersonaPeer::NRO_DOC;
		}

		return $this;
	} // setNroDoc()

	/**
	 * Set the value of [nom_apellido] column.
	 * 
	 * @param      string $v new value
	 * @return     Persona The current object (for fluent API support)
	 */
	public function setNomApellido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nom_apellido !== $v) {
			$this->nom_apellido = $v;
			$this->modifiedColumns[] = PersonaPeer::NOM_APELLIDO;
		}

		return $this;
	} // setNomApellido()

	/**
	 * Set the value of [apellido] column.
	 * 
	 * @param      string $v new value
	 * @return     Persona The current object (for fluent API support)
	 */
	public function setApellido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = PersonaPeer::APELLIDO;
		}

		return $this;
	} // setApellido()

	/**
	 * Sets the value of [fecha_nacimiento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Persona The current object (for fluent API support)
	 */
	public function setFechaNacimiento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha_nacimiento !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha_nacimiento !== null && $tmpDt = new DateTime($this->fecha_nacimiento)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha_nacimiento = $newDateAsString;
				$this->modifiedColumns[] = PersonaPeer::FECHA_NACIMIENTO;
			}
		} // if either are not null

		return $this;
	} // setFechaNacimiento()

	/**
	 * Set the value of [e_mail] column.
	 * 
	 * @param      string $v new value
	 * @return     Persona The current object (for fluent API support)
	 */
	public function setEMail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->e_mail !== $v) {
			$this->e_mail = $v;
			$this->modifiedColumns[] = PersonaPeer::E_MAIL;
		}

		return $this;
	} // setEMail()

	/**
	 * Set the value of [localidad_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Persona The current object (for fluent API support)
	 */
	public function setLocalidadId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->localidad_id !== $v) {
			$this->localidad_id = $v;
			$this->modifiedColumns[] = PersonaPeer::LOCALIDAD_ID;
		}

		if ($this->aLocalidad !== null && $this->aLocalidad->getId() !== $v) {
			$this->aLocalidad = null;
		}

		return $this;
	} // setLocalidadId()

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
			if ($this->nro_doc !== 0) {
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

			$this->nro_doc = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nom_apellido = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->apellido = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fecha_nacimiento = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->e_mail = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->localidad_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = PersonaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Persona object", $e);
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

		if ($this->aLocalidad !== null && $this->localidad_id !== $this->aLocalidad->getId()) {
			$this->aLocalidad = null;
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
			$con = Propel::getConnection(PersonaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PersonaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLocalidad = null;
			$this->collDireccions = null;

			$this->collInscriptos = null;

			$this->singleSocio = null;

			$this->collTelefonos = null;

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
			$con = Propel::getConnection(PersonaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PersonaQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePersona:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BasePersona:delete:post') as $callable)
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
			$con = Propel::getConnection(PersonaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePersona:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BasePersona:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				PersonaPeer::addInstanceToPool($this);
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

			if ($this->aLocalidad !== null) {
				if ($this->aLocalidad->isModified() || $this->aLocalidad->isNew()) {
					$affectedRows += $this->aLocalidad->save($con);
				}
				$this->setLocalidad($this->aLocalidad);
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

			if ($this->direccionsScheduledForDeletion !== null) {
				if (!$this->direccionsScheduledForDeletion->isEmpty()) {
					DireccionQuery::create()
						->filterByPrimaryKeys($this->direccionsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->direccionsScheduledForDeletion = null;
				}
			}

			if ($this->collDireccions !== null) {
				foreach ($this->collDireccions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

			if ($this->sociosScheduledForDeletion !== null) {
				if (!$this->sociosScheduledForDeletion->isEmpty()) {
					SocioQuery::create()
						->filterByPrimaryKeys($this->sociosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->sociosScheduledForDeletion = null;
				}
			}

			if ($this->singleSocio !== null) {
				if (!$this->singleSocio->isDeleted()) {
						$affectedRows += $this->singleSocio->save($con);
				}
			}

			if ($this->telefonosScheduledForDeletion !== null) {
				if (!$this->telefonosScheduledForDeletion->isEmpty()) {
					TelefonoQuery::create()
						->filterByPrimaryKeys($this->telefonosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->telefonosScheduledForDeletion = null;
				}
			}

			if ($this->collTelefonos !== null) {
				foreach ($this->collTelefonos as $referrerFK) {
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
		if ($this->isColumnModified(PersonaPeer::NRO_DOC)) {
			$modifiedColumns[':p' . $index++]  = '`NRO_DOC`';
		}
		if ($this->isColumnModified(PersonaPeer::NOM_APELLIDO)) {
			$modifiedColumns[':p' . $index++]  = '`NOM_APELLIDO`';
		}
		if ($this->isColumnModified(PersonaPeer::APELLIDO)) {
			$modifiedColumns[':p' . $index++]  = '`APELLIDO`';
		}
		if ($this->isColumnModified(PersonaPeer::FECHA_NACIMIENTO)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA_NACIMIENTO`';
		}
		if ($this->isColumnModified(PersonaPeer::E_MAIL)) {
			$modifiedColumns[':p' . $index++]  = '`E_MAIL`';
		}
		if ($this->isColumnModified(PersonaPeer::LOCALIDAD_ID)) {
			$modifiedColumns[':p' . $index++]  = '`LOCALIDAD_ID`';
		}

		$sql = sprintf(
			'INSERT INTO `persona` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`NRO_DOC`':
						$stmt->bindValue($identifier, $this->nro_doc, PDO::PARAM_INT);
						break;
					case '`NOM_APELLIDO`':
						$stmt->bindValue($identifier, $this->nom_apellido, PDO::PARAM_STR);
						break;
					case '`APELLIDO`':
						$stmt->bindValue($identifier, $this->apellido, PDO::PARAM_STR);
						break;
					case '`FECHA_NACIMIENTO`':
						$stmt->bindValue($identifier, $this->fecha_nacimiento, PDO::PARAM_STR);
						break;
					case '`E_MAIL`':
						$stmt->bindValue($identifier, $this->e_mail, PDO::PARAM_STR);
						break;
					case '`LOCALIDAD_ID`':
						$stmt->bindValue($identifier, $this->localidad_id, PDO::PARAM_INT);
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

			if ($this->aLocalidad !== null) {
				if (!$this->aLocalidad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocalidad->getValidationFailures());
				}
			}


			if (($retval = PersonaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDireccions !== null) {
					foreach ($this->collDireccions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInscriptos !== null) {
					foreach ($this->collInscriptos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->singleSocio !== null) {
					if (!$this->singleSocio->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleSocio->getValidationFailures());
					}
				}

				if ($this->collTelefonos !== null) {
					foreach ($this->collTelefonos as $referrerFK) {
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
		$pos = PersonaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNroDoc();
				break;
			case 1:
				return $this->getNomApellido();
				break;
			case 2:
				return $this->getApellido();
				break;
			case 3:
				return $this->getFechaNacimiento();
				break;
			case 4:
				return $this->getEMail();
				break;
			case 5:
				return $this->getLocalidadId();
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
		if (isset($alreadyDumpedObjects['Persona'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Persona'][$this->getPrimaryKey()] = true;
		$keys = PersonaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroDoc(),
			$keys[1] => $this->getNomApellido(),
			$keys[2] => $this->getApellido(),
			$keys[3] => $this->getFechaNacimiento(),
			$keys[4] => $this->getEMail(),
			$keys[5] => $this->getLocalidadId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aLocalidad) {
				$result['Localidad'] = $this->aLocalidad->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collDireccions) {
				$result['Direccions'] = $this->collDireccions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collInscriptos) {
				$result['Inscriptos'] = $this->collInscriptos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->singleSocio) {
				$result['Socio'] = $this->singleSocio->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
			}
			if (null !== $this->collTelefonos) {
				$result['Telefonos'] = $this->collTelefonos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PersonaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNroDoc($value);
				break;
			case 1:
				$this->setNomApellido($value);
				break;
			case 2:
				$this->setApellido($value);
				break;
			case 3:
				$this->setFechaNacimiento($value);
				break;
			case 4:
				$this->setEMail($value);
				break;
			case 5:
				$this->setLocalidadId($value);
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
		$keys = PersonaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroDoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomApellido($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaNacimiento($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEMail($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLocalidadId($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PersonaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PersonaPeer::NRO_DOC)) $criteria->add(PersonaPeer::NRO_DOC, $this->nro_doc);
		if ($this->isColumnModified(PersonaPeer::NOM_APELLIDO)) $criteria->add(PersonaPeer::NOM_APELLIDO, $this->nom_apellido);
		if ($this->isColumnModified(PersonaPeer::APELLIDO)) $criteria->add(PersonaPeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(PersonaPeer::FECHA_NACIMIENTO)) $criteria->add(PersonaPeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
		if ($this->isColumnModified(PersonaPeer::E_MAIL)) $criteria->add(PersonaPeer::E_MAIL, $this->e_mail);
		if ($this->isColumnModified(PersonaPeer::LOCALIDAD_ID)) $criteria->add(PersonaPeer::LOCALIDAD_ID, $this->localidad_id);

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
		$criteria = new Criteria(PersonaPeer::DATABASE_NAME);
		$criteria->add(PersonaPeer::NRO_DOC, $this->nro_doc);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getNroDoc();
	}

	/**
	 * Generic method to set the primary key (nro_doc column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setNroDoc($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getNroDoc();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Persona (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNomApellido($this->getNomApellido());
		$copyObj->setApellido($this->getApellido());
		$copyObj->setFechaNacimiento($this->getFechaNacimiento());
		$copyObj->setEMail($this->getEMail());
		$copyObj->setLocalidadId($this->getLocalidadId());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getDireccions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addDireccion($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getInscriptos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addInscripto($relObj->copy($deepCopy));
				}
			}

			$relObj = $this->getSocio();
			if ($relObj) {
				$copyObj->setSocio($relObj->copy($deepCopy));
			}

			foreach ($this->getTelefonos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTelefono($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setNroDoc('0'); // this is a auto-increment column, so set to default value
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
	 * @return     Persona Clone of current object.
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
	 * @return     PersonaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PersonaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Localidad object.
	 *
	 * @param      Localidad $v
	 * @return     Persona The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLocalidad(Localidad $v = null)
	{
		if ($v === null) {
			$this->setLocalidadId(NULL);
		} else {
			$this->setLocalidadId($v->getId());
		}

		$this->aLocalidad = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Localidad object, it will not be re-added.
		if ($v !== null) {
			$v->addPersona($this);
		}

		return $this;
	}


	/**
	 * Get the associated Localidad object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Localidad The associated Localidad object.
	 * @throws     PropelException
	 */
	public function getLocalidad(PropelPDO $con = null)
	{
		if ($this->aLocalidad === null && ($this->localidad_id !== null)) {
			$this->aLocalidad = LocalidadQuery::create()->findPk($this->localidad_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aLocalidad->addPersonas($this);
			 */
		}
		return $this->aLocalidad;
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
		if ('Direccion' == $relationName) {
			return $this->initDireccions();
		}
		if ('Inscripto' == $relationName) {
			return $this->initInscriptos();
		}
		if ('Telefono' == $relationName) {
			return $this->initTelefonos();
		}
	}

	/**
	 * Clears out the collDireccions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addDireccions()
	 */
	public function clearDireccions()
	{
		$this->collDireccions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collDireccions collection.
	 *
	 * By default this just sets the collDireccions collection to an empty array (like clearcollDireccions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initDireccions($overrideExisting = true)
	{
		if (null !== $this->collDireccions && !$overrideExisting) {
			return;
		}
		$this->collDireccions = new PropelObjectCollection();
		$this->collDireccions->setModel('Direccion');
	}

	/**
	 * Gets an array of Direccion objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Persona is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Direccion[] List of Direccion objects
	 * @throws     PropelException
	 */
	public function getDireccions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collDireccions || null !== $criteria) {
			if ($this->isNew() && null === $this->collDireccions) {
				// return empty collection
				$this->initDireccions();
			} else {
				$collDireccions = DireccionQuery::create(null, $criteria)
					->filterByPersona($this)
					->find($con);
				if (null !== $criteria) {
					return $collDireccions;
				}
				$this->collDireccions = $collDireccions;
			}
		}
		return $this->collDireccions;
	}

	/**
	 * Sets a collection of Direccion objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $direccions A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setDireccions(PropelCollection $direccions, PropelPDO $con = null)
	{
		$this->direccionsScheduledForDeletion = $this->getDireccions(new Criteria(), $con)->diff($direccions);

		foreach ($direccions as $direccion) {
			// Fix issue with collection modified by reference
			if ($direccion->isNew()) {
				$direccion->setPersona($this);
			}
			$this->addDireccion($direccion);
		}

		$this->collDireccions = $direccions;
	}

	/**
	 * Returns the number of related Direccion objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Direccion objects.
	 * @throws     PropelException
	 */
	public function countDireccions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collDireccions || null !== $criteria) {
			if ($this->isNew() && null === $this->collDireccions) {
				return 0;
			} else {
				$query = DireccionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPersona($this)
					->count($con);
			}
		} else {
			return count($this->collDireccions);
		}
	}

	/**
	 * Method called to associate a Direccion object to this object
	 * through the Direccion foreign key attribute.
	 *
	 * @param      Direccion $l Direccion
	 * @return     Persona The current object (for fluent API support)
	 */
	public function addDireccion(Direccion $l)
	{
		if ($this->collDireccions === null) {
			$this->initDireccions();
		}
		if (!$this->collDireccions->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddDireccion($l);
		}

		return $this;
	}

	/**
	 * @param	Direccion $direccion The direccion object to add.
	 */
	protected function doAddDireccion($direccion)
	{
		$this->collDireccions[]= $direccion;
		$direccion->setPersona($this);
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
	 * If this Persona is new, it will return
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
					->filterByPersona($this)
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
				$inscripto->setPersona($this);
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
					->filterByPersona($this)
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
	 * @return     Persona The current object (for fluent API support)
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
		$inscripto->setPersona($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Persona is new, it will return
	 * an empty collection; or if this Persona has previously
	 * been saved, it will retrieve related Inscriptos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Persona.
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
	 * Otherwise if this Persona is new, it will return
	 * an empty collection; or if this Persona has previously
	 * been saved, it will retrieve related Inscriptos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Persona.
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
	 * Gets a single Socio object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con optional connection object
	 * @return     Socio
	 * @throws     PropelException
	 */
	public function getSocio(PropelPDO $con = null)
	{

		if ($this->singleSocio === null && !$this->isNew()) {
			$this->singleSocio = SocioQuery::create()->findPk($this->getPrimaryKey(), $con);
		}

		return $this->singleSocio;
	}

	/**
	 * Sets a single Socio object as related to this object by a one-to-one relationship.
	 *
	 * @param      Socio $v Socio
	 * @return     Persona The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSocio(Socio $v = null)
	{
		$this->singleSocio = $v;

		// Make sure that that the passed-in Socio isn't already associated with this object
		if ($v !== null && $v->getPersona() === null) {
			$v->setPersona($this);
		}

		return $this;
	}

	/**
	 * Clears out the collTelefonos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTelefonos()
	 */
	public function clearTelefonos()
	{
		$this->collTelefonos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTelefonos collection.
	 *
	 * By default this just sets the collTelefonos collection to an empty array (like clearcollTelefonos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initTelefonos($overrideExisting = true)
	{
		if (null !== $this->collTelefonos && !$overrideExisting) {
			return;
		}
		$this->collTelefonos = new PropelObjectCollection();
		$this->collTelefonos->setModel('Telefono');
	}

	/**
	 * Gets an array of Telefono objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Persona is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Telefono[] List of Telefono objects
	 * @throws     PropelException
	 */
	public function getTelefonos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTelefonos || null !== $criteria) {
			if ($this->isNew() && null === $this->collTelefonos) {
				// return empty collection
				$this->initTelefonos();
			} else {
				$collTelefonos = TelefonoQuery::create(null, $criteria)
					->filterByPersona($this)
					->find($con);
				if (null !== $criteria) {
					return $collTelefonos;
				}
				$this->collTelefonos = $collTelefonos;
			}
		}
		return $this->collTelefonos;
	}

	/**
	 * Sets a collection of Telefono objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $telefonos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setTelefonos(PropelCollection $telefonos, PropelPDO $con = null)
	{
		$this->telefonosScheduledForDeletion = $this->getTelefonos(new Criteria(), $con)->diff($telefonos);

		foreach ($telefonos as $telefono) {
			// Fix issue with collection modified by reference
			if ($telefono->isNew()) {
				$telefono->setPersona($this);
			}
			$this->addTelefono($telefono);
		}

		$this->collTelefonos = $telefonos;
	}

	/**
	 * Returns the number of related Telefono objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Telefono objects.
	 * @throws     PropelException
	 */
	public function countTelefonos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTelefonos || null !== $criteria) {
			if ($this->isNew() && null === $this->collTelefonos) {
				return 0;
			} else {
				$query = TelefonoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPersona($this)
					->count($con);
			}
		} else {
			return count($this->collTelefonos);
		}
	}

	/**
	 * Method called to associate a Telefono object to this object
	 * through the Telefono foreign key attribute.
	 *
	 * @param      Telefono $l Telefono
	 * @return     Persona The current object (for fluent API support)
	 */
	public function addTelefono(Telefono $l)
	{
		if ($this->collTelefonos === null) {
			$this->initTelefonos();
		}
		if (!$this->collTelefonos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddTelefono($l);
		}

		return $this;
	}

	/**
	 * @param	Telefono $telefono The telefono object to add.
	 */
	protected function doAddTelefono($telefono)
	{
		$this->collTelefonos[]= $telefono;
		$telefono->setPersona($this);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->nro_doc = null;
		$this->nom_apellido = null;
		$this->apellido = null;
		$this->fecha_nacimiento = null;
		$this->e_mail = null;
		$this->localidad_id = null;
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
			if ($this->collDireccions) {
				foreach ($this->collDireccions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collInscriptos) {
				foreach ($this->collInscriptos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->singleSocio) {
				$this->singleSocio->clearAllReferences($deep);
			}
			if ($this->collTelefonos) {
				foreach ($this->collTelefonos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collDireccions instanceof PropelCollection) {
			$this->collDireccions->clearIterator();
		}
		$this->collDireccions = null;
		if ($this->collInscriptos instanceof PropelCollection) {
			$this->collInscriptos->clearIterator();
		}
		$this->collInscriptos = null;
		if ($this->singleSocio instanceof PropelCollection) {
			$this->singleSocio->clearIterator();
		}
		$this->singleSocio = null;
		if ($this->collTelefonos instanceof PropelCollection) {
			$this->collTelefonos->clearIterator();
		}
		$this->collTelefonos = null;
		$this->aLocalidad = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string The value of the 'nro_doc' column
	 */
	public function __toString()
	{
		return (string) $this->getNroDoc();
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BasePersona:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BasePersona
