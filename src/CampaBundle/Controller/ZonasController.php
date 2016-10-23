<?php

namespace CampaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CampaBundle\Entity\Zonas;
use CampaBundle\Form\ZonasType;

class ZonasController extends Controller
{
    public function indexAction()
    {
        return $this->render('CampaBundle:Zonas:index.html.twig');
    }
    
    public function mostrarAction($id)
    {

        $repository = $this->getDoctrine()->getRepository('CampaBundle:Zonas');

        $zona = $repository->find($id);
         
         if (!$zona) {
        return $this->render('CampaBundle:Default:error.html.twig');
        }
        else
        {
                
        return $this->render('CampaBundle:Zonas:mostrar.html.twig', array('zona'=>$zona));

        }
    	

     }
    
      public function crearAction(Request $request)
    {
        $zona = new Zonas();
        $form = $this->createForm(ZonasType::class,$zona);
           

        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $zona = $form->getData();

        $em = $this->getDoctrine()->getManager();
         $em->persist($zona);
         $em->flush();

        return $this->redirectToRoute('campa_zonas_ver');
    }


        return $this->render('CampaBundle:Zonas:crear.html.twig',array('form' => $form->createView()));
        
    }
   
     public function verAction(Request $request)
    {
       
        $em = $this->getDoctrine()->getManager();

       $zonas = $em->getRepository('CampaBundle:Zonas')->findall();

       $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $zonas,
            $request->query->getInt('page', 1),
            5);

      return $this->render('CampaBundle:Zonas:ver.html.twig', array('pagination'=>$pagination));
    
    /**
    $em = $this->getDoctrine()->getManager();

       $zonas = $em->getRepository('CampaBundle:Zonas')->findall();

       return $this->render('CampaBundle:Zonas:ver1.html.twig',array('zonas' => $zonas));
       */
    }
    
    public function editarAction($id, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository('CampaBundle:Zonas');

        $zona = $repository->find($id);
         
         if (!$zona) {
        return $this->render('CampaBundle:Default:error.html.twig');
        }
        else

        {

         $form = $this->createForm(ZonasType::class,$zona);

         $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $datos = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $em = $this->getDoctrine()->getManager();
$actual = $em->getRepository('CampaBundle:Zonas')->find($id);
         

         $em->flush();

        return $this->redirectToRoute('campa_zonas_ver');
    }

        }

             return $this->render('CampaBundle:Zonas:editar.html.twig',array('zona'=>$zona,'form' => $form->createView()));


    }
    
    public function eliminarAction($id)
    {       
           

$repository = $this->getDoctrine()->getRepository('CampaBundle:Zonas');

        $zona = $repository->find($id);
       
            if(!$zona)
        {
          return $this->render('CampaBundle:Default:error.html.twig');
        }
            else {
                
                 try{
                     
            $em = $this->getDoctrine()->getManager();
            $actual = $em->getRepository('CampaBundle:Zonas')->find($id);
            
            $em->remove($actual);
            $em->flush();

            $this->addFlash('notice','Dato eliminado');

        return $this->redirectToRoute('campa_zonas_ver');
            }
     catch(\Doctrine\ORM\ORMException $e){
                  $this->get('logger')->error($e->getMessage());
  //$this->get('logger')->error($e->getTraceAsString());
  // or some shortcut that need to be implemented
  // $this->logError($e);

  // some redirection e. g. to referer
  return $this->redirect($this->getRequest()->headers->get('referer'));
}}

    }
}
