<?php


/**
 * Base class that represents a row from the 'reserva' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseReserva extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ReservaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ReservaPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the socio_nro_doc field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $socio_nro_doc;

	/**
	 * The value for the tipo_reserva_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $tipo_reserva_id;

	/**
	 * The value for the dia_comienzo_reserva field.
	 * Note: this column has a database default value of: NULL
	 * @var        string
	 */
	protected $dia_comienzo_reserva;

	/**
	 * The value for the hora_comienzo_reserva field.
	 * Note: this column has a database default value of: '00:00:00'
	 * @var        string
	 */
	protected $hora_comienzo_reserva;

	/**
	 * The value for the dia_fin_reserva field.
	 * @var        string
	 */
	protected $dia_fin_reserva;

	/**
	 * The value for the hora_fin_reserva field.
	 * @var        string
	 */
	protected $hora_fin_reserva;

	/**
	 * The value for the cantidad_turnos field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $cantidad_turnos;

	/**
	 * @var        Socio
	 */
	protected $aSocio;

	/**
	 * @var        TipoReserva
	 */
	protected $aTipoReserva;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->socio_nro_doc = 0;
		$this->tipo_reserva_id = 0;
		$this->dia_comienzo_reserva = NULL;
		$this->hora_comienzo_reserva = '00:00:00';
		$this->cantidad_turnos = 1;
	}

	/**
	 * Initializes internal state of BaseReserva object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [socio_nro_doc] column value.
	 * 
	 * @return     int
	 */
	public function getSocioNroDoc()
	{
		return $this->socio_nro_doc;
	}

	/**
	 * Get the [tipo_reserva_id] column value.
	 * 
	 * @return     int
	 */
	public function getTipoReservaId()
	{
		return $this->tipo_reserva_id;
	}

	/**
	 * Get the [optionally formatted] temporal [dia_comienzo_reserva] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDiaComienzoReserva($format = 'Y-m-d')
	{
		if ($this->dia_comienzo_reserva === null) {
			return null;
		}


		if ($this->dia_comienzo_reserva === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->dia_comienzo_reserva);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dia_comienzo_reserva, true), $x);
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
	 * Get the [optionally formatted] temporal [hora_comienzo_reserva] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getHoraComienzoReserva($format = 'H:i:s')
	{
		if ($this->hora_comienzo_reserva === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->hora_comienzo_reserva);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->hora_comienzo_reserva, true), $x);
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
	 * Get the [optionally formatted] temporal [dia_fin_reserva] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDiaFinReserva($format = 'Y-m-d')
	{
		if ($this->dia_fin_reserva === null) {
			return null;
		}


		if ($this->dia_fin_reserva === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->dia_fin_reserva);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dia_fin_reserva, true), $x);
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
	 * Get the [optionally formatted] temporal [hora_fin_reserva] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getHoraFinReserva($format = 'H:i:s')
	{
		if ($this->hora_fin_reserva === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->hora_fin_reserva);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->hora_fin_reserva, true), $x);
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
	 * Get the [cantidad_turnos] column value.
	 * 
	 * @return     int
	 */
	public function getCantidadTurnos()
	{
		return $this->cantidad_turnos;
	}

	/**
	 * Set the value of [socio_nro_doc] column.
	 * 
	 * @param      int $v new value
	 * @return     Reserva The current object (for fluent API support)
	 */
	public function setSocioNroDoc($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->socio_nro_doc !== $v) {
			$this->socio_nro_doc = $v;
			$this->modifiedColumns[] = ReservaPeer::SOCIO_NRO_DOC;
		}

		if ($this->aSocio !== null && $this->aSocio->getPersonaNroDoc() !== $v) {
			$this->aSocio = null;
		}

		return $this;
	} // setSocioNroDoc()

	/**
	 * Set the value of [tipo_reserva_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Reserva The current object (for fluent API support)
	 */
	public function setTipoReservaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tipo_reserva_id !== $v) {
			$this->tipo_reserva_id = $v;
			$this->modifiedColumns[] = ReservaPeer::TIPO_RESERVA_ID;
		}

		if ($this->aTipoReserva !== null && $this->aTipoReserva->getId() !== $v) {
			$this->aTipoReserva = null;
		}

		return $this;
	} // setTipoReservaId()

	/**
	 * Sets the value of [dia_comienzo_reserva] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Reserva The current object (for fluent API support)
	 */
	public function setDiaComienzoReserva($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->dia_comienzo_reserva !== null || $dt !== null) {
			$currentDateAsString = ($this->dia_comienzo_reserva !== null && $tmpDt = new DateTime($this->dia_comienzo_reserva)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
				|| ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
				 ) {
				$this->dia_comienzo_reserva = $newDateAsString;
				$this->modifiedColumns[] = ReservaPeer::DIA_COMIENZO_RESERVA;
			}
		} // if either are not null

		return $this;
	} // setDiaComienzoReserva()

	/**
	 * Sets the value of [hora_comienzo_reserva] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Reserva The current object (for fluent API support)
	 */
	public function setHoraComienzoReserva($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->hora_comienzo_reserva !== null || $dt !== null) {
			$currentDateAsString = ($this->hora_comienzo_reserva !== null && $tmpDt = new DateTime($this->hora_comienzo_reserva)) ? $tmpDt->format('H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('H:i:s') : null;
			if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
				|| ($dt->format('H:i:s') === '00:00:00') // or the entered value matches the default
				 ) {
				$this->hora_comienzo_reserva = $newDateAsString;
				$this->modifiedColumns[] = ReservaPeer::HORA_COMIENZO_RESERVA;
			}
		} // if either are not null

		return $this;
	} // setHoraComienzoReserva()

	/**
	 * Sets the value of [dia_fin_reserva] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Reserva The current object (for fluent API support)
	 */
	public function setDiaFinReserva($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->dia_fin_reserva !== null || $dt !== null) {
			$currentDateAsString = ($this->dia_fin_reserva !== null && $tmpDt = new DateTime($this->dia_fin_reserva)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->dia_fin_reserva = $newDateAsString;
				$this->modifiedColumns[] = ReservaPeer::DIA_FIN_RESERVA;
			}
		} // if either are not null

		return $this;
	} // setDiaFinReserva()

	/**
	 * Sets the value of [hora_fin_reserva] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Reserva The current object (for fluent API support)
	 */
	public function setHoraFinReserva($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->hora_fin_reserva !== null || $dt !== null) {
			$currentDateAsString = ($this->hora_fin_reserva !== null && $tmpDt = new DateTime($this->hora_fin_reserva)) ? $tmpDt->format('H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->hora_fin_reserva = $newDateAsString;
				$this->modifiedColumns[] = ReservaPeer::HORA_FIN_RESERVA;
			}
		} // if either are not null

		return $this;
	} // setHoraFinReserva()

	/**
	 * Set the value of [cantidad_turnos] column.
	 * 
	 * @param      int $v new value
	 * @return     Reserva The current object (for fluent API support)
	 */
	public function setCantidadTurnos($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cantidad_turnos !== $v) {
			$this->cantidad_turnos = $v;
			$this->modifiedColumns[] = ReservaPeer::CANTIDAD_TURNOS;
		}

		return $this;
	} // setCantidadTurnos()

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
			if ($this->socio_nro_doc !== 0) {
				return false;
			}

			if ($this->tipo_reserva_id !== 0) {
				return false;
			}

			if ($this->dia_comienzo_reserva !== NULL) {
				return false;
			}

			if ($this->hora_comienzo_reserva !== '00:00:00') {
				return false;
			}

			if ($this->cantidad_turnos !== 1) {
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

			$this->socio_nro_doc = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->tipo_reserva_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->dia_comienzo_reserva = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->hora_comienzo_reserva = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->dia_fin_reserva = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->hora_fin_reserva = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->cantidad_turnos = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = ReservaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Reserva object", $e);
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

		if ($this->aSocio !== null && $this->socio_nro_doc !== $this->aSocio->getPersonaNroDoc()) {
			$this->aSocio = null;
		}
		if ($this->aTipoReserva !== null && $this->tipo_reserva_id !== $this->aTipoReserva->getId()) {
			$this->aTipoReserva = null;
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
			$con = Propel::getConnection(ReservaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ReservaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSocio = null;
			$this->aTipoReserva = null;
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
			$con = Propel::getConnection(ReservaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ReservaQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseReserva:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseReserva:delete:post') as $callable)
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
			$con = Propel::getConnection(ReservaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseReserva:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseReserva:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ReservaPeer::addInstanceToPool($this);
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

			if ($this->aSocio !== null) {
				if ($this->aSocio->isModified() || $this->aSocio->isNew()) {
					$affectedRows += $this->aSocio->save($con);
				}
				$this->setSocio($this->aSocio);
			}

			if ($this->aTipoReserva !== null) {
				if ($this->aTipoReserva->isModified() || $this->aTipoReserva->isNew()) {
					$affectedRows += $this->aTipoReserva->save($con);
				}
				$this->setTipoReserva($this->aTipoReserva);
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


		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ReservaPeer::SOCIO_NRO_DOC)) {
			$modifiedColumns[':p' . $index++]  = '`SOCIO_NRO_DOC`';
		}
		if ($this->isColumnModified(ReservaPeer::TIPO_RESERVA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`TIPO_RESERVA_ID`';
		}
		if ($this->isColumnModified(ReservaPeer::DIA_COMIENZO_RESERVA)) {
			$modifiedColumns[':p' . $index++]  = '`DIA_COMIENZO_RESERVA`';
		}
		if ($this->isColumnModified(ReservaPeer::HORA_COMIENZO_RESERVA)) {
			$modifiedColumns[':p' . $index++]  = '`HORA_COMIENZO_RESERVA`';
		}
		if ($this->isColumnModified(ReservaPeer::DIA_FIN_RESERVA)) {
			$modifiedColumns[':p' . $index++]  = '`DIA_FIN_RESERVA`';
		}
		if ($this->isColumnModified(ReservaPeer::HORA_FIN_RESERVA)) {
			$modifiedColumns[':p' . $index++]  = '`HORA_FIN_RESERVA`';
		}
		if ($this->isColumnModified(ReservaPeer::CANTIDAD_TURNOS)) {
			$modifiedColumns[':p' . $index++]  = '`CANTIDAD_TURNOS`';
		}

		$sql = sprintf(
			'INSERT INTO `reserva` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`SOCIO_NRO_DOC`':
						$stmt->bindValue($identifier, $this->socio_nro_doc, PDO::PARAM_INT);
						break;
					case '`TIPO_RESERVA_ID`':
						$stmt->bindValue($identifier, $this->tipo_reserva_id, PDO::PARAM_INT);
						break;
					case '`DIA_COMIENZO_RESERVA`':
						$stmt->bindValue($identifier, $this->dia_comienzo_reserva, PDO::PARAM_STR);
						break;
					case '`HORA_COMIENZO_RESERVA`':
						$stmt->bindValue($identifier, $this->hora_comienzo_reserva, PDO::PARAM_STR);
						break;
					case '`DIA_FIN_RESERVA`':
						$stmt->bindValue($identifier, $this->dia_fin_reserva, PDO::PARAM_STR);
						break;
					case '`HORA_FIN_RESERVA`':
						$stmt->bindValue($identifier, $this->hora_fin_reserva, PDO::PARAM_STR);
						break;
					case '`CANTIDAD_TURNOS`':
						$stmt->bindValue($identifier, $this->cantidad_turnos, PDO::PARAM_INT);
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

			if ($this->aSocio !== null) {
				if (!$this->aSocio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSocio->getValidationFailures());
				}
			}

			if ($this->aTipoReserva !== null) {
				if (!$this->aTipoReserva->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoReserva->getValidationFailures());
				}
			}


			if (($retval = ReservaPeer::doValidate($this, $columns)) !== true) {
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
		$pos = ReservaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSocioNroDoc();
				break;
			case 1:
				return $this->getTipoReservaId();
				break;
			case 2:
				return $this->getDiaComienzoReserva();
				break;
			case 3:
				return $this->getHoraComienzoReserva();
				break;
			case 4:
				return $this->getDiaFinReserva();
				break;
			case 5:
				return $this->getHoraFinReserva();
				break;
			case 6:
				return $this->getCantidadTurnos();
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
		if (isset($alreadyDumpedObjects['Reserva'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Reserva'][serialize($this->getPrimaryKey())] = true;
		$keys = ReservaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSocioNroDoc(),
			$keys[1] => $this->getTipoReservaId(),
			$keys[2] => $this->getDiaComienzoReserva(),
			$keys[3] => $this->getHoraComienzoReserva(),
			$keys[4] => $this->getDiaFinReserva(),
			$keys[5] => $this->getHoraFinReserva(),
			$keys[6] => $this->getCantidadTurnos(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSocio) {
				$result['Socio'] = $this->aSocio->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aTipoReserva) {
				$result['TipoReserva'] = $this->aTipoReserva->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = ReservaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSocioNroDoc($value);
				break;
			case 1:
				$this->setTipoReservaId($value);
				break;
			case 2:
				$this->setDiaComienzoReserva($value);
				break;
			case 3:
				$this->setHoraComienzoReserva($value);
				break;
			case 4:
				$this->setDiaFinReserva($value);
				break;
			case 5:
				$this->setHoraFinReserva($value);
				break;
			case 6:
				$this->setCantidadTurnos($value);
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
		$keys = ReservaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSocioNroDoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipoReservaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiaComienzoReserva($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHoraComienzoReserva($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiaFinReserva($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHoraFinReserva($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantidadTurnos($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ReservaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ReservaPeer::SOCIO_NRO_DOC)) $criteria->add(ReservaPeer::SOCIO_NRO_DOC, $this->socio_nro_doc);
		if ($this->isColumnModified(ReservaPeer::TIPO_RESERVA_ID)) $criteria->add(ReservaPeer::TIPO_RESERVA_ID, $this->tipo_reserva_id);
		if ($this->isColumnModified(ReservaPeer::DIA_COMIENZO_RESERVA)) $criteria->add(ReservaPeer::DIA_COMIENZO_RESERVA, $this->dia_comienzo_reserva);
		if ($this->isColumnModified(ReservaPeer::HORA_COMIENZO_RESERVA)) $criteria->add(ReservaPeer::HORA_COMIENZO_RESERVA, $this->hora_comienzo_reserva);
		if ($this->isColumnModified(ReservaPeer::DIA_FIN_RESERVA)) $criteria->add(ReservaPeer::DIA_FIN_RESERVA, $this->dia_fin_reserva);
		if ($this->isColumnModified(ReservaPeer::HORA_FIN_RESERVA)) $criteria->add(ReservaPeer::HORA_FIN_RESERVA, $this->hora_fin_reserva);
		if ($this->isColumnModified(ReservaPeer::CANTIDAD_TURNOS)) $criteria->add(ReservaPeer::CANTIDAD_TURNOS, $this->cantidad_turnos);

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
		$criteria = new Criteria(ReservaPeer::DATABASE_NAME);
		$criteria->add(ReservaPeer::SOCIO_NRO_DOC, $this->socio_nro_doc);
		$criteria->add(ReservaPeer::TIPO_RESERVA_ID, $this->tipo_reserva_id);
		$criteria->add(ReservaPeer::DIA_COMIENZO_RESERVA, $this->dia_comienzo_reserva);
		$criteria->add(ReservaPeer::HORA_COMIENZO_RESERVA, $this->hora_comienzo_reserva);

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
		$pks[0] = $this->getSocioNroDoc();
		$pks[1] = $this->getTipoReservaId();
		$pks[2] = $this->getDiaComienzoReserva();
		$pks[3] = $this->getHoraComienzoReserva();

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
		$this->setSocioNroDoc($keys[0]);
		$this->setTipoReservaId($keys[1]);
		$this->setDiaComienzoReserva($keys[2]);
		$this->setHoraComienzoReserva($keys[3]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getSocioNroDoc()) && (null === $this->getTipoReservaId()) && (null === $this->getDiaComienzoReserva()) && (null === $this->getHoraComienzoReserva());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Reserva (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setSocioNroDoc($this->getSocioNroDoc());
		$copyObj->setTipoReservaId($this->getTipoReservaId());
		$copyObj->setDiaComienzoReserva($this->getDiaComienzoReserva());
		$copyObj->setHoraComienzoReserva($this->getHoraComienzoReserva());
		$copyObj->setDiaFinReserva($this->getDiaFinReserva());
		$copyObj->setHoraFinReserva($this->getHoraFinReserva());
		$copyObj->setCantidadTurnos($this->getCantidadTurnos());

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
	 * @return     Reserva Clone of current object.
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
	 * @return     ReservaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ReservaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Socio object.
	 *
	 * @param      Socio $v
	 * @return     Reserva The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSocio(Socio $v = null)
	{
		if ($v === null) {
			$this->setSocioNroDoc(0);
		} else {
			$this->setSocioNroDoc($v->getPersonaNroDoc());
		}

		$this->aSocio = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Socio object, it will not be re-added.
		if ($v !== null) {
			$v->addReserva($this);
		}

		return $this;
	}


	/**
	 * Get the associated Socio object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Socio The associated Socio object.
	 * @throws     PropelException
	 */
	public function getSocio(PropelPDO $con = null)
	{
		if ($this->aSocio === null && ($this->socio_nro_doc !== null)) {
			$this->aSocio = SocioQuery::create()->findPk($this->socio_nro_doc, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSocio->addReservas($this);
			 */
		}
		return $this->aSocio;
	}

	/**
	 * Declares an association between this object and a TipoReserva object.
	 *
	 * @param      TipoReserva $v
	 * @return     Reserva The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTipoReserva(TipoReserva $v = null)
	{
		if ($v === null) {
			$this->setTipoReservaId(0);
		} else {
			$this->setTipoReservaId($v->getId());
		}

		$this->aTipoReserva = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the TipoReserva object, it will not be re-added.
		if ($v !== null) {
			$v->addReserva($this);
		}

		return $this;
	}


	/**
	 * Get the associated TipoReserva object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     TipoReserva The associated TipoReserva object.
	 * @throws     PropelException
	 */
	public function getTipoReserva(PropelPDO $con = null)
	{
		if ($this->aTipoReserva === null && ($this->tipo_reserva_id !== null)) {
			$this->aTipoReserva = TipoReservaQuery::create()->findPk($this->tipo_reserva_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aTipoReserva->addReservas($this);
			 */
		}
		return $this->aTipoReserva;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->socio_nro_doc = null;
		$this->tipo_reserva_id = null;
		$this->dia_comienzo_reserva = null;
		$this->hora_comienzo_reserva = null;
		$this->dia_fin_reserva = null;
		$this->hora_fin_reserva = null;
		$this->cantidad_turnos = null;
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
		} // if ($deep)

		$this->aSocio = null;
		$this->aTipoReserva = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ReservaPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseReserva:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseReserva
