<?php

namespace oGooseBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //Test Author
       /* $author = new \oGooseBundle\Entity\Author;
        $author->setFirstname('Mohammadi');
        $author->setLastname('El Youzghi');
        $author->setEmail('mo.elyouzghi@gmail.com');
        
        $em->persist($author);
        $em->flush();
        die('author created'); //It works*/
        
        //Test Project
        /*$author = $em->getRepository('oGooseBundle:Author')->find(1);
        $project = new \oGooseBundle\Entity\Project;
        $project->setTitle('Projecte 1');
        $project->setAbstract('Resum del projecte 1');
        $project->setKeywords('resum, projecte');
        $project->setPublicationdate(new \DateTime());
        $project->setAllowcomments(true);
        $project->setOpen(true);
        $project->setFinish(false);
        $project->setAuthor($author);
        
        $em->persist($project);
        $em->flush(); //It works*/
        
        //Test Attachment
        /*$author = $em->getRepository('oGooseBundle:Author')->find(1);
        $project = $em->getRepository('oGooseBundle:Project')->find(1);
        $att = new \oGooseBundle\Entity\Attachment;
        $att->setFilename('test.docx');
        $att->setCreationdate(new \DateTime());
        $att->setAuthor($author);
        $att->setProject($project);
        
        $em->persist($att);
        $em->flush(); //It works*/
        
        $fields = $em->getRepository('oGooseBundle:Field')->findAll();
        $projecttypes = $em->getRepository('oGooseBundle:Projecttype')->findAll();
        
        return $this->render('oGooseBundle:index.html.twig', array('fields' => $fields, 'projecttypes' => $projecttypes));
    }
}
