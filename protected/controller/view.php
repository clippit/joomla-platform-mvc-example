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
		// Render the template.
		$templatePath = $this->getApplication()->get('template.path', JPATH_SITE . '/template');
		$buffer = $this->getApplication()->getTemplate()->render($templatePath . '/main.php');

		// Set the rendered theme to the response body.
		$this->getApplication()->setBody($buffer);
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

		$view = new LHViewUser($user, $this->getViewPaths());
		$view->setLayout('user.view');
		$this->getApplication()->getTemplate()->buffer->set('page.content', $view->render());
	}

	/**
	 * View all users
	 */
	public function viewAll()
	{
		$users = LHModel::getInstance('user')->findAll();
		
		$view = new LHViewUser($users, $this->getViewPaths());
		$view->setLayout('user.index');
		$this->getApplication()->getTemplate()->buffer->set('page.content', $view->render());
	}

	/**
	 * Get the view paths queue.
	 *
	 * @return  SplPriorityQueue  The paths queue.
	 */
	protected function getViewPaths()
	{
		// Get the theme path.
		$templatePath = $this->app->get('template.path', JPATH_SITE . '/template');

		// Setup the page paths.
		$paths = new SplPriorityQueue;
		$paths->insert($templatePath . '/_view', 1);

		return $paths;
	}
}