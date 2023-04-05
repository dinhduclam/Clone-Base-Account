<?php

class BaseController
{
	public string $layout = 'main';

	public function render($view, $params = [])
	{
		return Application::$app->view->renderView($view, $params);
	}
}

?>