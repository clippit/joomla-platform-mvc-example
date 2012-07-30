<?php
class LHApplicationWeb extends JApplicationWeb
{
	/**
	 * Definition of URL router.
	 * @var JApplicationWebRouterBase
	 */
	private $_router;

	/**
	 * Method to initialize the app
	 * @return LHApplicationWeb This object for method chaining.
	 */
	public function init()
	{
		$this->initialise()->loadDatabase()->loadRouter();

		// Set generator info
		$caption = 'Joomla! Platform MVC Example';
		$this->getDocument()
			->setGenerator($caption)
			->setHtml5(true);

		// Set onBeforeRender event callback to change page title
		// Anonymous function is available in PHP 5.3+
		$this->registerEvent('onBeforeRender', function() use ($caption) {
			$document = JFactory::getDocument();
			$title = $document->getTitle();
			$document->setTitle($title ? "$title - $caption" : $caption);
		});

		return $this;
	}

	/**
	 * Method to create a database driver for the application.
	 *
	 * @return  LHApplicationWeb  This object for method chaining.
	 */
	public function loadDatabase()
	{
		$dbName = $this->get('database.name');

		$this->db = JDatabaseDriver::getInstance(
			array(
				'driver' => $this->get('database.driver'),
				'host' => $this->get('database.host'),
				'user' => $this->get('database.user'),
				'password' => $this->get('database.pass'),
				'database' => $dbName,
				'prefix' => $this->get('database.prefix')
			)
		);

		// Select the database.
		$this->db->select($dbName);

		// Set the debug flag.
		$this->db->setDebug($this->get('debug'));

		// Set the database to our static cache.
		JFactory::$database = $this->db;

		return $this;
	}

	/**
	 * Method to load URL Routes from config file
	 * @return LHApplicationWeb This object for method chaining.
	 */
	public function loadRouter()
	{
		$this->_router = new JApplicationWebRouterBase($this);
		$this->_router->setControllerPrefix('LHController')
			->setDefaultController($this->get('url_router.default_controller', 'site'));
		$this->addRoutes($this->get('url_router.routes', array()));

		return $this;
	}

	protected function doExecute()
	{
		// Execute
		$this->_router->execute($this->get('uri.route'));
	}

	/**
	 * Method to get the application configuration data to be loaded.
	 *
	 * @return  object  An object to be loaded into the application configuration.
	 */
	protected function fetchConfigurationData($file = '', $class = '')
	{
		// Instantiate variables.
		$_config = array();

		// Find the configuration file path.
		if (!defined('JPATH_CONFIGURATION'))
		{
			define('JPATH_CONFIGURATION', JPATH_BASE . '/config');
		}

		// Set the configuration file path for the application.
		if (file_exists(JPATH_CONFIGURATION . '/main.json'))
		{
			$file = JPATH_CONFIGURATION . '/main.json';
		}
		else
		{
			$file = JPATH_CONFIGURATION . '/main.dist.json';
		}

		// Verify the configuration exists and is readable.
		if (!is_readable($file))
		{
			throw new RuntimeException('Configuration file does not exist or is unreadable.');
		}

		// Load the configuration file into an object.
		$_config = json_decode(file_get_contents($file));
		if ($_config === null)
		{
			throw new RuntimeException(sprintf('Unable to parse the configuration file %s.', $file));
		}

		JFactory::$config = new JRegistry($_config);
		return $_config;
	}

	/**
	 * Method to set the routes for the application
	 * 
	 * @param array $routes An array of routes to add to the application
	 *
	 * @return void
	 */
	protected function addRoutes($routes)
	{
		foreach ($routes as $r)
		{
			$this->_router->addMap($r->route, $r->controller);
		}
	}

}