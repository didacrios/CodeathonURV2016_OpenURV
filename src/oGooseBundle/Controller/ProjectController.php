<?php

namespace oGooseBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @Route("/project/{id}", name="project_show")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request, $id)
    {   
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('oGooseBundle:Project');
        $queryBuilder = $repository->createQueryBuilder('p')
                ->innerJoin('p.projecttype', 'pt')
                ->innerJoin('p.field', 'f')
                ->innerJoin('p.author', 'au')
                ->leftJoin('p.ratings', 'r')
                ->leftJoin('p.attachments', 'a')
                ->where("p.id = $id")
                ->select('p, pt, f, au, r')
                //->addSelect('SUM(r.stars) / COUNT(r) as totalstars')
                ->orderBy('p.publicationdate', 'desc')
                ->addOrderBy('a.creationdate', 'desc');
        
        $query = $queryBuilder->getQuery();
        $project = $query->getSingleResult();
        
        return $this->render('oGooseBundle:project.html.twig', array('project' => $project));
    }
}
