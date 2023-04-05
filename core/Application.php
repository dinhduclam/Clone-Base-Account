<?php

include_once "Router.php";
include_once "Request.php";
include_once "View.php";

class Application
{
	public static string $ROOT_PATH;
	public static Application $app;
	public Router $router;
	public Request $request;
	public BaseController $controller;
	public View $view;

	public function __construct($rootPath)
	{
		Application::$ROOT_PATH = $rootPath;
		$this->request = new Request();
		$this->router = new Router($this->request);
		$this->view = new View();
		Application::$app = $this;
	}

	public function run()
	{
		echo $this->router->resolve($this->request);
	}
}

?>