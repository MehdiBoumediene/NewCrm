<?php

namespace App\Controller;

use App\Entity\Tuteur;
use App\Form\TuteurType;
use App\Repository\TuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tuteur')]
class TuteurController extends AbstractController
{
    #[Route('/', name: 'app_tuteur_index', methods: ['GET'])]
    public function index(TuteurRepository $tuteurRepository): Response
    {
        return $this->render('tuteur/index.html.twig', [
            'tuteurs' => $tuteurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tuteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TuteurRepository $tuteurRepository): Response
    {
        $tuteur = new Tuteur();
        $form = $this->createForm(TuteurType::class, $tuteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tuteurRepository->add($tuteur, true);

            return $this->redirectToRoute('app_tuteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tuteur/new.html.twig', [
            'tuteur' => $tuteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tuteur_show', methods: ['GET'])]
    public function show(Tuteur $tuteur): Response
    {
        return $this->render('tuteur/show.html.twig', [
            'tuteur' => $tuteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tuteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tuteur $tuteur, TuteurRepository $tuteurRepository): Response
    {
        $form = $this->createForm(TuteurType::class, $tuteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tuteurRepository->add($tuteur, true);

            return $this->redirectToRoute('app_tuteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tuteur/edit.html.twig', [
            'tuteur' => $tuteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tuteur_delete', methods: ['POST'])]
    public function delete(Request $request, Tuteur $tuteur, TuteurRepository $tuteurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tuteur->getId(), $request->request->get('_token'))) {
            $tuteurRepository->remove($tuteur, true);
        }

        return $this->redirectToRoute('app_tuteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
