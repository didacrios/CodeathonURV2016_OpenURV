<?php

namespace oGooseBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AttachmentController extends Controller
{
    /**
     * @Route("/attachment/{id}", name="attachment_download")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request, $id)
    {   
        $em = $this->getDoctrine()->getManager();
        $att = $em->getRepository('oGooseBundle:Attachment')->find($id);
        $filename = $att->getFilename();
        $fullPath = '../media/attachments/' . $filename;
        
        $response = new Response();
        $response->headers->set('Cache-Control', 'private');
        $response->headers->set('Content-Type', mime_content_type($fullPath).'; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$filename.'"');

        $response->sendHeaders();
        $response->setContent(readfile($fullPath));

        return $response;
    }
}