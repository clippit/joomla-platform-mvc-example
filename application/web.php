<?php
class LHApplicationWeb extends JApplicationWeb
{
	/**
	 * Difinition of URL router.
	 * @todo read router setting from config file
	 * @var array
	 */
	private $_routes = array(
		'index' => 'site',
		'view' => 'view',
		'view/:view_id' => 'view'
	);

	protected function doExecute()
	{
		$router = new JApplicationWebRouterBase($this);
		$router->setControllerPrefix('LHController')
			->setDefaultController('site')
			->addMaps($this->_routes)
			->execute($this->get('uri.route'));
	}

}