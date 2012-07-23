<?php
class LHApplicationWeb extends JApplicationWeb
{
	/**
	 * Definition of URL router.
	 * @var JApplicationWebRouterBase
	 */
	private $_router;

	protected function doExecute()
	{
		// Initialize URL Router
		$this->_router = new JApplicationWebRouterBase($this);
		$this->_router->setControllerPrefix('LHController')
			->setDefaultController($this->get('urlRouter.defaultController', 'site'));
		$this->addRoutes($this->get('urlRouter.routes', array()));

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
		$config = array();

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
		$config = json_decode(file_get_contents($file));
		if ($config === null)
		{
			throw new RuntimeException(sprintf('Unable to parse the configuration file %s.', $file));
		}

		JFactory::$config = $config;
		return $config;
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