<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class head extends AbstractController
{
    public function head_render(): Response
    {
        return $this->render('partes/head.html.twig', [
           'devuelto_dos' => 'uno mas'
        ]);
    }

    
}
?>