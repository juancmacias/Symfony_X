<?php

namespace App\Controller;

use App\Entity\Relacion;
use App\Form\RelacionType;
use App\Repository\RelacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/relacion')]
class RelacionController extends AbstractController
{
    #[Route('/', name: 'app_relacion_index', methods: ['GET'])]
    public function index(RelacionRepository $relacionRepository): Response
    {
        return $this->render('relacion/index.html.twig', [
            'relacions' => $relacionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_relacion_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RelacionRepository $relacionRepository): Response
    {
        $relacion = new Relacion();
        $form = $this->createForm(RelacionType::class, $relacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $relacionRepository->save($relacion, true);

            return $this->redirectToRoute('app_relacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('relacion/new.html.twig', [
            'relacion' => $relacion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_relacion_show', methods: ['GET'])]
    public function show(Relacion $relacion): Response
    {
        return $this->render('relacion/show.html.twig', [
            'relacion' => $relacion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_relacion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Relacion $relacion, RelacionRepository $relacionRepository): Response
    {
        $form = $this->createForm(RelacionType::class, $relacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $relacionRepository->save($relacion, true);

            return $this->redirectToRoute('app_relacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('relacion/edit.html.twig', [
            'relacion' => $relacion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_relacion_delete', methods: ['POST'])]
    public function delete(Request $request, Relacion $relacion, RelacionRepository $relacionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$relacion->getId(), $request->request->get('_token'))) {
            $relacionRepository->remove($relacion, true);
        }

        return $this->redirectToRoute('app_relacion_index', [], Response::HTTP_SEE_OTHER);
    }
}
