<?php
class LHControllerView extends JControllerBase
{
	public function execute() {
		$id = $this->input->getInt('user_id');
		$this->getApplication()->setBody("View User" . ($id ? " #$id" : ""));
	}
}