<?php
class LHViewUser extends JViewHtml
{
	protected $userList;

	/**
	 * Method to instantiate the view.
	 *
	 * @param   mixed            $model  The model object or array of models
	 * @param   SplPriorityQueue  $paths  The paths queue.
	 *
	 * @throws RuntimeException
	 */
	public function __construct($model, SplPriorityQueue $paths = null)
	{
		if ($model instanceof LHModelUser)
		{
			parent::__construct($model, $paths);
		}
		else if (is_array($model))
		{
			foreach ($model as $obj) {
				// Check whether each element is valid
				if (!($obj instanceof LHModelUser))
				{
					throw new RuntimeException("Only Accept array of LHModelUser", 400);					
				}
			}
			$this->userList = $model;

			// Setup dependencies.
			$this->paths = isset($paths) ? $paths : $this->loadPaths();
		}
		else
		{
			throw new RuntimeException("Cannot create View", 400);
		}

		
	}
}