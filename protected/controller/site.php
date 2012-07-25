<?php
class LHControllerSite extends JControllerBase
{
	public function execute() {
		$this->getApplication()->getTemplate()->buffer->set('page.header.title', 'Joomla! Platform MVC Example');
		$body = '<p><a href="user/">View Users</a></p>';
		$this->getApplication()->getTemplate()->buffer->set('page.content', $body);

		// Render the template.
		$templatePath = $this->getApplication()->get('template.path', JPATH_SITE . '/template');
		$buffer = $this->getApplication()->getTemplate()->render($templatePath . '/main.php');

		// Set the rendered theme to the response body.
		$this->getApplication()->setBody($buffer);
	}
}
