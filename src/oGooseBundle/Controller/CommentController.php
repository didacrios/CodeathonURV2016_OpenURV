<?php

namespace oGooseBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CommentController extends Controller
{
    /**
     * @Route("/comment", name="comment_new")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {   
        $em = $this->getDoctrine()->getManager();
        $projectid = $request->get('projectid');
        $authorid = $request->get('authorid');
        $comment = $request->get('comment');
        $type = $request->get('type');
        
        $project = $em->getRepository('oGooseBundle:Project')->find($projectid);
        $author = $em->getRepository('oGooseBundle:Author')->find($authorid);
        
        $newComment = new \oGooseBundle\Entity\Comment;
        $newComment->setComment($comment);
        $newComment->setType($type);
        $newComment->setProject($project);
        $newComment->setAuthor($author);
        $newComment->setCreationdate(new \DateTime());
        
        $em->persist($newComment);
        $em->flush();
        
        $returnSection = $request->get('section');
        $returnUrl = $this->generateUrl( 'project_show', array('id' => $projectid, 'section' => $returnSection));
        return new RedirectResponse($returnUrl, 302);
    }

}