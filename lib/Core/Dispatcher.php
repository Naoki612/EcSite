<?php
class Dispatcher{
	private $sysRoot;

	public function setSystemRoot($path) {
		$this->sysRoot = rtrim($path, '/');
	}
	public function dispatch() {
		$param = ereg_replace('/?$', '', $_SERVER['REQUEST_URI']);

		$params = array();
		if('' != $params) {
			$params = explode('/', $param);
		}

		$controller = 'index';
		if (0 < count($params)) {
			$controller = $params[0];
		}
		$className = ucfirst(strtolower($controller)). 'Controller';

		require_once $this->sysRoot . '/controller/' .$className . '.php';

		$controller = new $className();

		$action = 'index';
		if(1 < count($params)) {
			$action = $params[1];
		}

		$actionMethod = $action .'Action';
		$controllerInstance->$actionMethos();
	}
}
