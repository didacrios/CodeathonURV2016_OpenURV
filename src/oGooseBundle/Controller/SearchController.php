<?php

namespace oGooseBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * @Route("/search", name="search")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {   
        $em = $this->getDoctrine()->getManager();
        $realKeyword = '';
        $projects = array();
 
        if ($request->getMethod() == 'POST') {
            //Recollim les dades del formulari
            $fieldid = $request->get('fieldid');
            $projecttypeid = $request->get('projecttypeid');
            $finish = $request->get('finish');
            $realKeyword = $request->get('keyword');
            $keyword = $this->_parseKeywords($realKeyword);

            //Creem la query amb el filtre principal
            $repository = $em->getRepository('oGooseBundle:Project');
            $queryBuilder = $repository->createQueryBuilder('p')
                    ->innerJoin('p.projecttype', 'pt')
                    ->innerJoin('p.field', 'f')
                    ->innerJoin('p.author', 'au')
                    ->leftJoin('p.ratings', 'r')
                    ->where("(p.keywords like '%$keyword%' OR p.title like '%$keyword%')")
                    ->select('p, pt, f, au, r')
                    ->addSelect('SUM(r.stars) / COUNT(r) as totalstars')
                    ->orderBy('p.publicationdate', 'desc');

            if (!empty($fieldid)) { //Si tenim àmbit, afegim el filtre
                $queryBuilder->andWhere('f.id = ' . $fieldid);
            }

            if (!empty($projecttypeid)) { //Si tenim tipus de projecte, afegim el filtre
                $queryBuilder->andWhere('pt.id = ' . $projecttypeid);
            }

            if ($finish != '') { //Si tenim 'en progrès' o 'finalitzat', afegim el filtre
                $queryBuilder->andWhere('p.finish = ' . $finish);
            }

            //Obtenim els resultats
            $query = $queryBuilder->getQuery();
            $projects = $query->getResult();
            //die($query->getSql());
        }
        
        //Opcions del buscador
        $fields = $em->getRepository('oGooseBundle:Field')->findAll();
        $projecttypes = $em->getRepository('oGooseBundle:Projecttype')->findAll();
        
        return $this->render('oGooseBundle:search.html.twig', array('keyword' => $realKeyword, 'projects' => $projects, 'fields' => $fields, 'projecttypes' => $projecttypes));
    }
    
    private function _parseKeywords($string) {
        $parsedString = preg_replace('/[^a-z0-9]+/', '%', $string);
        return $parsedString;
    }
}
