<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class dos extends AbstractController
{
    #[Route('/dos', name: 'app_dos')]
    public function index(): Response
    {
        return $this->render('dos.html.twig', [
            'controller_name' => 'dos',
        ]);
    }
}
