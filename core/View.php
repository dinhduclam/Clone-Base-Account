<?php

class View
{
    public function renderView($view, array $params = [])
    {
        if (Application::$app->controller) {
            $layoutName = Application::$app->controller->layout;
        }
		else $layoutName = 'main';

		foreach ($params as $key => $value) {
            $$key = $value;
        }
        $viewContent = $this->renderViewOnly($view, $params);

        ob_start();
        include_once Application::$ROOT_PATH."/views/layouts/$layoutName.php";
        $layoutContent = ob_get_clean();

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderViewOnly($view, array $params)
    {
		foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_PATH."/views/$view.php";
        return ob_get_clean();
    }
}

?>