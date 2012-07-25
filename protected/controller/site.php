<?php
class LHControllerSite extends LHController
{
	/**
	 * Build the page and set buffers in the template object.
	 * @return void
	 */
	public function build() {
		$this->getApplication()->getTemplate()->buffer->set('page.header.title', 'Joomla! Platform MVC Example');
		$body = '<p><a href="user/">View Users</a></p>';
		$this->getApplication()->getTemplate()->buffer->set('page.content', $body);
	}
}
