<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClasseType;
use App\Repository\ClasseRepository;
use App\Repository\ModuleRepository;
use App\Repository\ApprenantRepository;
use App\Repository\IntervenantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/classe")
 */
class ClasseController extends AbstractController
{
    /**
     * @Route("/", name="app_classe_index", methods={"GET"})
     */
    public function index(ClasseRepository $classeRepository): Response
    {
        return $this->render('classe/index.html.twig', [
            'classe' => $classeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_classe_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ClasseRepository $classeRepository): Response
    {
        $classe = new Classe();
        $form = $this->createForm(ClasseType::class, $classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTimeImmutable('now');
         
            $classe->setCreatedBy($this->getUser()->getEmail());
            $classe->setUser($this->getUser());
            
            $classe->setCreatedAt($date);
            $classeRepository->add($classe);

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('classe/new.html.twig', [
            'classe' => $classe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_classe_show", methods={"GET"})
     */
    public function show(Classe $classe, ModuleRepository $moduleRepository, IntervenantRepository $intervenantRepository , ApprenantRepository $apprenantRepository): Response
    {
        return $this->render('classe/show.html.twig', [
            'classe' => $classe,
            'module' => $moduleRepository->findBy(array('classe'=>$classe)),
            'intervenant' => $intervenantRepository->findBy(array('classe'=>$classe)),
            'apprenant' => $apprenantRepository->findBy(array('classe'=>$classe)),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_classe_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Classe $classe, ClasseRepository $classeRepository): Response
    {
        $form = $this->createForm(ClasseType::class, $classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $classeRepository->add($classe);

            return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('classe/edit.html.twig', [
            'classe' => $classe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_classe_delete", methods={"POST"})
     */
    public function delete(Request $request, Classe $classe, ClasseRepository $classeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classe->getId(), $request->request->get('_token'))) {
            $classeRepository->remove($classe);
        }

        return $this->redirectToRoute('app_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}