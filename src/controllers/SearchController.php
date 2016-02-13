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
        $sql = "SELECT p.id, p.title, p.publicationdate, p.finish, p.fieldid, pt.name as 'projecttype' FROM project p LEFT JOIN projecttype pt ON pt.id=p.projecttypeid WHERE (p.keywords like '%$keyword%' OR p.title like '%$keyword%')";
        //$params = array($keyword, $keyword); //Sembla que no fa el binding dels paràmetres, de moment seguim així
        
        if (!empty($fieldid)) { //Si tenim àmbit, afegim el filtre
            $sql .= " AND p.fieldid = $fieldid";
            //$params[] = $fieldid;
        }
        
        if (!empty($projecttypeid)) { //Si tenim tipus de projecte, afegim el filtre
            $sql .= " AND p.projecttypeid = $projecttypeid";
            //$params[] = $projecttypeid;
        }
        
        if ($finish != '') { //Si tenim 'en progrès' o 'finalitzat', afegim el filtre
            $sql .= " AND p.finish = $finish";
            //$params[] = $finish;
        }
        
        //Obtenim els results
        $rs = $app['db']->query($sql);
        $projects = $rs->fetchAll(\PDO::FETCH_OBJ);
        //die('<pre>' . print_r($projects, true));
        
        //Opcions del buscador
        $fields = $app['db']->fetchAll('SELECT * FROM field');
        $projecttypes = $app['db']->fetchAll('SELECT * FROM projecttype');
        
        //Mostrem la plantilla de resultats de cerca
        return $app['twig']->render('search.html.twig', array('projects' => $projects, 'fields' => $fields, 'projecttypes' => $projecttypes));
    }
    
    private function _parseKeywords($string) {
        $parsedString = preg_replace('/[^a-z0-9]+/', '%', $string);
        return $parsedString;
    }

}
