<?php

include_once "Router.php";
include_once "Request.php";
include_once "Response.php";
include_once "Session.php";
include_once "View.php";

class Application
{
	public static string $ROOT_PATH;
	public static Application $app;
	public Router $router;
	public Request $request;
	public Response $response;
	public BaseController $controller;
	public Session $session;
	public View $view;
	public $db;

	public function __construct($rootPath)
	{
		Application::$ROOT_PATH = $rootPath;
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router($this->request);
		$this->session = new Session();
		$this->view = new View();
		$this->connectDb();

		Application::$app = $this;
	}

	public function run()
	{
		echo $this->router->resolve($this->request);
	}

	public function connectDb()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = 'base_account';

		$this->db = new mysqli($servername, $username, $password, $dbname);

		if ($this->db->connect_error) {
			die("Connection to DB failed");
		}
	}
}

?>