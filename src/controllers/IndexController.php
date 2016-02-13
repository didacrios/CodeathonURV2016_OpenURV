<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController {

    public function getHomePage(Request $request, Application $app) {
        $fields = $app['db']->fetchAll('SELECT * FROM field');
        $projecttypes = $app['db']->fetchAll('SELECT * FROM projecttype');
        
        
        return $app['twig']->render('index.html.twig', array('fields' => $fields, 'projecttypes' => $projecttypes));
    }

}
