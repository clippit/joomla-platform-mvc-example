<?php
class LHController extends JControllerBase
{
	public function execute() {
		// Build page content
		$output = $this->build();

		// Render document
		JFactory::getDocument()->setBuffer($output, array('type' => 'component', 'name' => null, 'title' => null));

		return true;
	}
}