<?php
class LHControllerView extends LHController
{
	/**
	 * Build the page and set buffers in the template object.
	 * @return void
	 */
	public function build() {
		$id = $this->input->getInt('user_id');
		if ($id)
		{
			$this->view($id);
		}
		else
		{
			$this->viewAll();
		}
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

		$this->renderContent($user, 'user.view');
	}

	/**
	 * View all users
	 */
	public function viewAll()
	{
		$users = LHModel::getInstance('user')->findAll();
		$this->renderContent($users, 'user.index');
	}

	/**
	 * Create View Class and render it into page.content template
	 * @param  mixed  $model  The model object or array of models
	 * @param  string $layout Render layout
	 * @return void
	 */
	protected function renderContent($model, $layout)
	{
		$view = new LHViewUser($model, $this->getViewPaths());
		$view->setLayout($layout);
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