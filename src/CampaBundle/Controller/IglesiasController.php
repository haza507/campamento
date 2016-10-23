<?php

namespace CampaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CampaBundle\Entity\Iglesias;
use CampaBundle\Entity\Distritos;
use CampaBundle\Entity\Zonas;
use CampaBundle\Form\IglesiasType;

class IglesiasController extends Controller
{   

  

    public function indexAction()
    {
        return $this->render('CampaBundle:Iglesias:index.html.twig');
    }
    
    public function mostrarAction($id)
    {

        $repository = $this->getDoctrine()->getRepository('CampaBundle:Iglesias');
        $dato = $repository->find($id);

         
         if (!$dato) {
        return $this->render('CampaBundle:Default:error.html.twig');
        }
        else
        {
                
        return $this->render('CampaBundle:Iglesias:mostrar.html.twig', array('dato'=>$dato));

        }
    	

     }
    
      public function crearAction(Request $request)
    {   
       
        
        
         $dato = new Iglesias();
        $form = $this->createForm(IglesiasType::class,$dato);
           

      

        $form->handleRequest($request);

       

    if ($form->isSubmitted() && $form->isValid()) {
        
        
        
        $em = $this->getDoctrine()->getManager();
         $em->persist($dato);
         $em->flush();

        $this->get('session')->getFlashBag()->add(
            'notice',
            'Se han guardado los cambios.'
        );
        
        return $this->redirectToRoute('campa_Iglesias_ver');
    }


        return $this->render('CampaBundle:Iglesias:crear.html.twig',array('form' => $form->createView()));
        
    }
   public function busca($id)
{
    $query = $this->getEntityManager()
        ->createQuery(
            'SELECT d, z FROM CampaBundle:Iglesias d JOIN d.Id_Zona z WHERE z.idzona = :id'
        )->setParameter('id', $id);
 
    try {
        return $query->getSingleResult();
    } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    }
}
     public function verAction(Request $request)
    { 
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();
 
        $query = "SELECT d.Nombre AS nombred, d.Lider, d.Id_Distrito, d.Valor, z.Nombre AS nombrez
FROM  `Iglesias` d
INNER JOIN  `zonas` z ON d.Id_Zona = z.Id_Zona
ORDER BY nombrez, nombred ASC 
LIMIT 0 , 30;";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $datos=$stmt->fetchAll();
        
       $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $datos,
            $request->query->getInt('page', 1),
            5);

      return $this->render('CampaBundle:Iglesias:ver.html.twig', array('pagination'=>$pagination));
    
   
        
        
       /**
         // Mostrar todo
        foreach ($Iglesias as $p) {
            echo $p["nombred"];
            echo "<br/>";
            echo $p["nombrez"];
            echo "<hr/>";
        }
        
        
         
        
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT t FROM CampaBundle:Iglesias t ORDER BY t.iddistrito ASC";
        $Iglesias = $em->createQuery($dql);

       $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Iglesias,
            $request->query->getInt('page', 1),
            5);

      return $this->render('CampaBundle:Iglesias:ver.html.twig', array('pagination'=>$pagination));
    
    
    $em = $this->getDoctrine()->getManager();

       $Iglesias = $em->getRepository('CampaBundle:Iglesias')->findall();

       return $this->render('CampaBundle:Iglesias:ver1.html.twig',array('Iglesias' => $Iglesias));
       */
    }
    
    public function editarAction($id, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository('CampaBundle:Iglesias');

        $dato = $repository->find($id);
         
         if (!$dato) {
        return $this->render('CampaBundle:Default:error.html.twig');
        }
        else

        {

         $form = $this->createForm(IglesiasType::class,$dato);

         $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $datos = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $em = $this->getDoctrine()->getManager();
$actual = $em->getRepository('CampaBundle:Iglesias')->find($id);
         

         $em->flush();

        return $this->redirectToRoute('campa_Iglesias_ver');
    }

        }

             return $this->render('CampaBundle:Iglesias:editar.html.twig',array('dato'=>$dato,'form' => $form->createView()));


    }
    
    public function eliminarAction($id)
    {       
        

       $repository = $this->getDoctrine()->getRepository('CampaBundle:Iglesias');

        $dato = $repository->find($id);
       
            if(!$dato)
        {
          return $this->render('CampaBundle:Default:error.html.twig');
        }
            else {
                
                   try{
                       
            $em = $this->getDoctrine()->getManager();
            $actual = $em->getRepository('CampaBundle:Iglesias')->find($id);
            
            $em->remove($actual);
            $em->flush();

           $this->get('session')->getFlashBag()->add(
            'notice',
            'Se han Eliminado los datos.'
        );

        return $this->redirectToRoute('campa_Iglesias_ver');
            }
             catch(\Doctrine\ORM\ORMException $e){
                  $this->get('logger')->error($e->getMessage());
  //$this->get('logger')->error($e->getTraceAsString());
  // or some shortcut that need to be implemented
  // $this->logError($e);

  // some redirection e. g. to referer
  return $this->redirect($this->getRequest()->headers->get('referer'));
}


    }
}
}
