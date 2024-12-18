<?php

require 'helpers/nonce.php';

class ModelController
{
	protected ?array $viewData = NULL;
	protected ?array $globalVars = NULL;

	public function __construct ()
	{
		$this->viewData = [
			'title' => '?Title?',
			'view' => '?View?',
			'stylesheets' => array(),
			'scripts' => array()
		];

		$this->globalVars = [
			'nonce' => create_nonce()
		];
	}

	public function render_body (): void
	{
		/* To access the controller's functions and data,
		use the "this" keyword inside the view */

		require_once 'views/'.$this->viewData['view'].'.php';
	}

	public function title (): string
	{
		return $this->viewData['title'];
	}

	public function get_stylesheets (): array
	{
		return $this->viewData['stylesheets'];
	}

	public function get_scripts (): array
	{
		return $this->viewData['scripts'];
	}

	public function get_vars (): array
	{
		return $this->globalVars;
	}

	protected function enqueue_stylesheet (string $filename): void
	{
		$this->viewData['stylesheets'][] = 'public/styles/'.$filename;
	}

	protected function enqueue_script (string $filename, bool $is_module = false): void
	{
		$type = 'text/javascript';

		if($is_module)
		{
			$type = 'module';
		}

		$this->viewData['scripts'][] = [ 'src' => 'public/src/'.$filename, 'type' => $type ];
	}

	protected function enqueue_vars (array $values): void
	{
		foreach($values as $key => $value)
		{
			$this->globalVars[$key] = $value;
		}
	}
}

?>