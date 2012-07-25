<?php
class LHController extends JControllerBase
{
	public function execute() {
		// Build page content
		$this->build();

		// Render the template.
		$templatePath = $this->getApplication()->get('template.path', JPATH_SITE . '/template');
		$buffer = $this->getApplication()->getTemplate()->render($templatePath . '/main.php');

		// Set the rendered theme to the response body.
		$this->getApplication()->setBody($buffer);

		return true;
	}
}