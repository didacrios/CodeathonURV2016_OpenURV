<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController {

    public function getResults(Request $request, Application $app) {
        
        //Recollim les dades del formulari
        $fieldid = $request->get('fieldid');
        $projecttypeid = $request->get('projecttypeid');
        $finish = $request->get('finish');
        $keyword = $this->_parseKeywords($request->get('keyword'));
        
        //Creem la query amb el filtre principal
        $sql = "SELECT * FROM project WHERE (keywords like '%$keyword%' OR title like '%$keyword%')";
        //$params = array($keyword, $keyword); //Sembla que no fa el binding dels paràmetres, de moment seguim així
        
        if (!empty($fieldid)) { //Si tenim àmbit, afegim el filtre
            $sql .= " AND fieldid = $fieldid";
            //$params[] = $fieldid;
        }
        
        if (!empty($projecttypeid)) { //Si tenim tipus de projecte, afegim el filtre
            $sql .= " AND projecttypeid = $projecttypeid";
            //$params[] = $projecttypeid;
        }
        
        if ($finish != '') { //Si tenim 'en progrès' o 'finalitzat', afegim el filtre
            $sql .= " AND finish = $finish";
            //$params[] = $finish;
        }
        
        //Obtenim els results
        $projects = $app['db']->fetchAll($sql);
        //die(var_dump($projects));
        
        //Mostrem la plantilla de resultats de cerca
        return $app['twig']->render('search.html.twig', array('projects' => $projects));
    }
    
    private function _parseKeywords($string) {
        $parsedString = preg_replace('/[^a-z0-9]+/', '%', $string);
        return $parsedString;
    }

}
