<?php
class LHControllerSite extends LHController
{
	/**
	 * Build the page and set buffers in the template object.
	 * @return output content
	 */
	public function build() {
		JFactory::getDocument()->setTitle("Home");
		return '<p><a href="user/" class="btn btn-large">View Users</a></p>';
	}
}
