<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
   
 
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }

   
    #[Route('/inscription', name: 'app_registration')]
    public function index(Request $request): Response
    {


        $user= new User();
        $form=$this->createForm(RegisterType::class,$user);

        $form->handleRequest($request);
    
      /*  if ($form->isSubmitted() && $form->isValid()) { 
            
        }*/

        return $this->render('registration/index.html.twig');
    }
}
