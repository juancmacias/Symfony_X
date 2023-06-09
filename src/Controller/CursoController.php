<?php

namespace App\Controller;

use App\Entity\Curso;
use App\Form\CursoType;
use App\Repository\CursoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/curso')]
class CursoController extends AbstractController
{
    #[Route('/', name: 'app_curso_index', methods: ['GET'])]
    public function index(CursoRepository $cursoRepository): Response
    {
        return $this->render('curso/index.html.twig', [
            'cursos' => $cursoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_curso_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CursoRepository $cursoRepository): Response
    {
        $curso = new Curso();
        $form = $this->createForm(CursoType::class, $curso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cursoRepository->save($curso, true);

            return $this->redirectToRoute('app_curso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('curso/new.html.twig', [
            'curso' => $curso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_curso_show', methods: ['GET'])]
    public function show(Curso $curso): Response
    {
        return $this->render('curso/show.html.twig', [
            'curso' => $curso,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_curso_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Curso $curso, CursoRepository $cursoRepository): Response
    {
        $form = $this->createForm(CursoType::class, $curso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cursoRepository->save($curso, true);

            return $this->redirectToRoute('app_curso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('curso/edit.html.twig', [
            'curso' => $curso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_curso_delete', methods: ['POST'])]
    public function delete(Request $request, Curso $curso, CursoRepository $cursoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$curso->getId(), $request->request->get('_token'))) {
            $cursoRepository->remove($curso, true);
        }

        return $this->redirectToRoute('app_curso_index', [], Response::HTTP_SEE_OTHER);
    }
}
