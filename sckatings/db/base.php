<?php



class app {

	public function __construct($path) {
		$this->route = explode('/', $path);
		$this->run();
	}

	private function run() {
		$url = array_shift($this->route);
		if (!preg_match('#^[a-zA-Z0-9.,-]*$#', $url))
			throw new Exception('Invalid path');
		$ctrlName = 'ctrl' . ucfirst($url);
		if (file_exists('app/' . $ctrlName.'.php')) {
			$this->runController($ctrlName);
		} else {
			array_unshift($this->route, $url);
			$this->runController('controller');
		}
	}

	private function runController($ctrlName) {
		include "app/" . $ctrlName . ".php";
		$ctrl = new $ctrlName();
		if (empty($this->route) || empty($this->route[0])) {
			$ctrl->index();
		} else {
			if (empty($this->route))
				$method = 'index';
			else
				$method = array_shift($this->route);
			if (method_exists($ctrl, $method)) {
				if (empty($this->route))
				$ctrl->$method();
				else
					call_user_func_array (array($ctrl,$method), $this->route);
			} else
				throw new Exception('Error 404');
		}
	}

}