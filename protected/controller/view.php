<?php
class LHControllerView extends JControllerBase
{
	public function execute() {
		$id = $this->input->getInt('view_id');
		$this->getApplication()->setBody("View" . ($id ? " #$id" : ""));
	}
}