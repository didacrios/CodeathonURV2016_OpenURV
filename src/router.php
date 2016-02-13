<?php

/*$app->get('/hello/{name}', function ($name) use ($app) {
//    $projects = $app['db']->fetchAll('SELECT * FROM project');
//    die(var_dump($projects));


//    return $app['twig']->render('hello.twig', array(
//        'name' => $name,
//    ));
//    return 'Router Hello '.$app->escape($name);

});
*/

$app->get('/', 'IndexController::getHomePage');
$app->post('/search', 'SearchController::getResults');
