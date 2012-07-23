<?php
// We are a valid Joomla entry point.
define('_JEXEC', 1);

// Setup the base path related constant.
define('JPATH_SITE', dirname(__FILE__) . '/protected');
define('JPATH_BASE', JPATH_SITE);
define('JPATH_PLATFORM', dirname(dirname(__FILE__)) . '/joomla/libraries');

// Import the platform
require_once JPATH_PLATFORM.'/import.php';

// Make sure that the Joomla Platform has been successfully loaded.
if (!class_exists('JLoader'))
{
	exit('Joomla Platform not loaded.');
}

// Set error handler to echo.
// JLog::addLogger(array('logger' => 'echo'), JLog::ALL);

// Setup autoloader, {@link http://developer.joomla.org/manual/ch01s04.html}
JLoader::registerPrefix('LH', JPATH_BASE);

try
{
	// Instantiate the application.
	$app = JApplicationWeb::getInstance('LHApplicationWeb');

	// Store the application.
	JFactory::$application = $app;

	// Execute the application.
	$app->execute();
}
catch (Exception $e)
{
	// Set the server response code.
	header('Status: 500', true, 500);

	// An exception has been caught, echo the message and exit.
	echo json_encode(array('message' => $e->getMessage(), 'code' => $e->getCode()));
	exit;
}