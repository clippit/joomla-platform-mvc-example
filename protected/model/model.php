<?php
abstract class LHModel extends JTable implements JModel
{
	/**
	 * The model state.
	 *
	 * @var    JRegistry
	 * @since  12.1
	 */
	protected $state;

	/**
	 * Primary key name
	 * @var string
	 */
	protected $pk = 'id';

	/**
	 * Should return table name, not including "#__"
	 * @return string
	 */
	abstract protected function tableName();

	/**
	 * Instantiate the model.
	 *
	 * @param   JRegistry        $state  The model state.
	 * @param   JDatabaseDriver  $db     The database adpater.
	 *
	 * @since   12.1
	 */
	public function __construct(JDatabaseDriver $db = null, JRegistry $state = null)
	{
		// Setup the model.
		$this->state = isset($state) ? $state : $this->loadState();
		// Setup the model.
		$_db = isset($db) ? $db : $this->loadDb();
		// Call JTable construction
		parent::__construct('#__' . $this->tableName(), $this->pk, $_db);
	}

	/**
	 * Change default prefix in parent method
	 * 
	 * @param   string  $type    The type (name) of the JTable class to get an instance of.
	 * @param   string  $prefix  An optional prefix for the table class name.
	 * @param   array   $config  An optional array of configuration values for the JTable object.
	 * 
	 * @return  mixed    A JTable object if found or boolean false if one could not be found.
	 */
	public static function getInstance($type, $prefix = 'LHModel', $config = array())
	{
		return parent::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to find all rows from the database by condition and bind the fields
	 * to the JTable instance properties.
	 *
	 * @param   mixed    $condition   An array of fields to match.
	 * @param   boolean  $reset       True to reset the default values before loading the new row.
	 *
	 * @return  array  All records
	 *
	 * @throws  RuntimeException
	 * @throws  UnexpectedValueException
	 */
	public function findAll($condition = array(), $reset = true)
	{
		if (!is_array($condition))
		{
			throw new UnexpectedValueException("Condition must be an array", 1);
			return null;
		}

		if ($reset)
		{
			$this->reset();
		}

		// Initialise the query.
		$query = $this->_db->getQuery(true);
		$query->select('*');
		$query->from($this->_tbl);
		$fields = array_keys($this->getProperties());

		foreach ($condition as $field => $value)
		{
			// Check that $field is in the table.
			if (!in_array($field, $fields))
			{
				throw new UnexpectedValueException(sprintf('Missing field in database: %s &#160; %s.', get_class($this), $field));
			}
			// Add the search tuple to the query.
			$query->where($this->_db->quoteName($field) . ' = ' . $this->_db->quote($value));
		}

		$this->_db->setQuery($query);

		$_rows = $this->_db->loadAssocList();

		// Check that we have a result.
		if (empty($_rows))
		{
			return false;
		}

		$result = array();
		$className = get_class($this);
		foreach ($_rows as $row) {
			$record = new $className;
			$record->bind($row);
			$result[] = $record;
		}
		return $result;
	}

	/**
	 * Get the model state.
	 *
	 * @return  JRegistry  The state object.
	 *
	 * @since   12.1
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * Set the model state.
	 *
	 * @param   JRegistry  $state  The state object.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function setState(JRegistry $state)
	{
		$this->state = $state;
	}

	/**
	 * Load the model state.
	 *
	 * @return  JRegistry  The state object.
	 *
	 * @since   12.1
	 */
	protected function loadState()
	{
		return new JRegistry;
	}

	/**
	 * Get the database driver.
	 *
	 * @return  JDatabaseDriver  The database driver.
	 *
	 * @since   12.1
	 */
	public function getDb()
	{
		return $this->getDbo();
	}

	/**
	 * Set the database driver.
	 *
	 * @param   JDatabaseDriver  $db  The database driver.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function setDb(JDatabaseDriver $db)
	{
		$this->setDBO($db);
	}

	/**
	 * Load the database driver.
	 *
	 * @return  JDatabaseDriver  The database driver.
	 *
	 * @since   12.1
	 */
	protected function loadDb()
	{
		return JFactory::getDbo();
	}

}