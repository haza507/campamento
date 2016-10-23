<?php

namespace CampaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CampaBundle\Entity\Cabana;
use CampaBundle\Form\CabanaType;

class CabanasController extends Controller
{
    public function indexAction()
    {
        return $this->render('CampaBundle:Cabanas:index.html.twig');
    }
    
    public function mostrarAction($id)
    {

        $repository = $this->getDoctrine()->getRepository('CampaBundle:Cabana');

        $dato = $repository->find($id);
         
         if (!$dato) {
        return $this->render('CampaBundle:Default:error.html.twig');
        }
        else
        {
                
        return $this->render('CampaBundle:Cabanas:mostrar.html.twig', array('dato'=>$dato));

        }
    	

     }
    
      public function crearAction(Request $request)
    {
        $dato = new Cabana();
        $form = $this->createForm(CabanaType::class,$dato);
           

        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $dato = $form->getData();

        $em = $this->getDoctrine()->getManager();
         $em->persist($dato);
         $em->flush();

        return $this->redirectToRoute('campa_cabanas_ver');
    }


        return $this->render('CampaBundle:Cabanas:crear.html.twig',array('form' => $form->createView()));
        
    }
   
     public function verAction(Request $request)
    {
       
        $em = $this->getDoctrine()->getManager();

       $Cabanas = $em->getRepository('CampaBundle:Cabana')->findall();

       $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Cabanas,
            $request->query->getInt('page', 1),
            5);

      return $this->render('CampaBundle:Cabanas:ver.html.twig', array('pagination'=>$pagination));
    
    /**
    $em = $this->getDoctrine()->getManager();

       $Cabanas = $em->getRepository('CampaBundle:Cabanas')->findall();

       return $this->render('CampaBundle:Cabanas:ver1.html.twig',array('Cabanas' => $Cabanas));
       */
    }
    
    public function editarAction($id, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository('CampaBundle:Cabana');

        $dato = $repository->find($id);
         
         if (!$dato) {
        return $this->render('CampaBundle:Default:error.html.twig');
        }
        else

        {

         $form = $this->createForm(CabanaType::class,$dato);

         $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $datos = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $em = $this->getDoctrine()->getManager();
$actual = $em->getRepository('CampaBundle:Cabana')->find($id);
         

         $em->flush();

        return $this->redirectToRoute('campa_cabanas_ver');
    }

        }

             return $this->render('CampaBundle:Cabanas:editar.html.twig',array('dato'=>$dato,'form' => $form->createView()));


    }
    
    public function eliminarAction($id)
    {       
           

$repository = $this->getDoctrine()->getRepository('CampaBundle:Cabana');

        $dato = $repository->find($id);
       
            if(!$dato)
        {
          return $this->render('CampaBundle:Default:error.html.twig');
        }
            else {
            $em = $this->getDoctrine()->getManager();
            $actual = $em->getRepository('CampaBundle:Cabana')->find($id);
            
            $em->remove($actual);
            $em->flush();

            $this->addFlash('notice','Dato eliminado');

        return $this->redirectToRoute('campa_cabanas_ver');
            }


    }
}
