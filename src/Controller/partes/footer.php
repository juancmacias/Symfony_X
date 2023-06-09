<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class footer extends AbstractController
{
    public function footer_iniciar(): Response
    {
        return $this->render('partes/footer.html.twig', [
           'devuelto_dos' => 'uno mas'
        ]);
    }

    
}
?>