<?php
class LHView
{
	/**
	 * The template buffer.
	 *
	 * @var    JRegistry
	 */
	public $buffer;

	/**
	 * Instantiate the template view.
	 *
	 * @param   JRegistry        $buffer    The theme buffer.
	 *
	 * @throws  RuntimeException
	 */
	public function __construct(JRegistry $buffer = null, JRegistry $options = null, PTThemeRenderer $renderer = null)
	{
		// Setup dependencies.
		$this->buffer = isset($buffer) ? $buffer : $this->loadBuffer();
	}

	/**
	 * Render the template.
	 *
	 * @param   string  $path  The path to the view.
	 *
	 * @return  string  The rendered view.
	 */
	public function render($path)
	{
		ob_start();
		include $path;
		$content = ob_get_clean();

		return $content;
	}

	/**
	 * Load the template buffer.
	 *
	 * @return  JRegistry  The template buffer.
	 */
	protected function loadBuffer()
	{
		return new JRegistry;
	}
}