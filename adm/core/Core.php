<?php
class Core {

	public function run() {

		$url = '/';
		if(isset($_GET['url'])) {
			$url .= $_GET['url'];
		}

		/*echo "URL: ".$url;
		exit;*/

		$params = array();

		if(!empty($url) && $url != '/') {

			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0) {
				$params = $url;
			}

			/*echo "IF: ";
			exit;*/

		} else {
			/*echo "ELSE: ";
			exit;*/

			$currentController = 'homeController';
			$currentAction = 'index';
		}

		/*echo "CONTROLLER: ".$currentController;
		exit;*/

		if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
			$currentController = 'notfoundController';
			$currentAction = 'index';
		}

		//echo "CONTROLLER: ".$currentController;

		$c = new $currentController();

		call_user_func_array(array($c, $currentAction), $params);
		
	}

}