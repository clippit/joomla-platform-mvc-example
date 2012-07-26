<?php
class LHControllerView extends LHController
{
	/**
	 * Build the page and set buffers in the template object.
	 * @return output content
	 */
	public function build() {
		$id = $this->input->getInt('user_id');
		if ($id)
		{
			return $this->view($id);
		}
		else
		{
			return $this->viewAll();
		}
	}

	/**
	 * View single user
	 * @param  int $id User ID
	 * @return output content
	 */
	public function view($id)
	{
		$user = LHModel::getInstance('user');
		if (!$user->load($id))
			throw new RuntimeException("User not exists.", 404);

		return $this->renderContent($user, 'user.view');
	}

	/**
	 * View all users
	 * @return output content
	 */
	public function viewAll()
	{
		$users = LHModel::getInstance('user')->findAll();
		return $this->renderContent($users, 'user.index');
	}

	/**
	 * Create View Class and render it into page.content template
	 * @param  mixed  $model  The model object or array of models
	 * @param  string $layout Render layout
	 * @return output content
	 */
	protected function renderContent($model, $layout)
	{
		$view = new LHViewUser($model, $this->getViewPaths());
		$view->setLayout($layout);
		return $view->render();
	}

	/**
	 * Get the view paths queue.
	 *
	 * @return  SplPriorityQueue  The paths queue.
	 */
	protected function getViewPaths()
	{
		// Get the theme path.
		$templatePath = $this->app->get('themes.base', JPATH_SITE . '/template');

		// Setup the page paths.
		$paths = new SplPriorityQueue;
		$paths->insert($templatePath . '/_view', 1);

		return $paths;
	}
}