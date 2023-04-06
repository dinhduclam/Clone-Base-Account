<?php

class Router
{
	public $routes = [];
	private Request $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function get($route, $callback)
	{
		$this->routes['get'][$route] = $callback;
	}

	public function post($route, $callback)
	{
		$this->routes['post'][$route] = $callback;
	}

	public function resolve()
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();
		$func = $this->routes[$method][$path] ?? false;

		if ($func === false){
			Application::$app->response->statusCode(404);
			return 'Not Found';
		}

		if (is_string($func))
			return Application ::$view->renderView($func);

		if (is_array($func)){
			Application::$app->controller = new $func[0];
			$func[0] = Application::$app->controller;
		}

		return call_user_func($func);
	}
}

?>