<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class testimonial extends AbstractController
{
    public function testimonial_iniciar(): Response
    {
        return $this->render('partes/testimonial.html.twig', [
           'devuelto_dos' => 'uno mas'
        ]);
    }

    
}
?>