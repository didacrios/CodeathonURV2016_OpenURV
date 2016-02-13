<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController {
	public function getHome (Request $request, Application $app) {
		return 'Home';
	}
}
