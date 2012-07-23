<?php
class LHControllerSite extends JControllerBase
{
	public function execute() {
		$this->getApplication()->setBody("Site Index");
	}
}