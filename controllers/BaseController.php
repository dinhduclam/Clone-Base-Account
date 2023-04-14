<?php

class BaseController
{
	public string $layout = 'main';

	protected function render($view, $params = [])
	{
		return Application::$app->view->renderView($view, $params);
	}
}

?>