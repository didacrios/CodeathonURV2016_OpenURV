<?php

namespace oGooseBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthorController extends Controller
{
    /**
     * @Route("/author/{id}", name="author_show")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request, $id)
    {   
        $em = $this->getDoctrine()->getManager();
        $author = $em->getRepository('oGooseBundle:Author')->find($id);
        
        return $this->render('oGooseBundle:author.html.twig', array('author' => $author));
    }

}