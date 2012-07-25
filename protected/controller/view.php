<?php
class LHControllerView extends JControllerBase
{
	/**
	 * Entry of this controller
	 * @return boolean success status
	 */
	public function execute() {
		$id = $this->input->getInt('user_id');
		if ($id)
		{
			$this->view($id);
		}
		else
		{
			$this->viewAll();
		}
		return true;
	}

	/**
	 * View single user
	 * @param  int $id User ID
	 */
	public function view($id)
	{
		$user = LHModel::getInstance('user');
		if (!$user->load($id))
			throw new RuntimeException("User not exists.", 404);

		var_dump($user);
	}

	/**
	 * View all users
	 */
	public function viewAll()
	{
		$users = LHModel::getInstance('user')->findAll();
		var_dump($users);
	}
}