<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class header extends AbstractController
{
    public function header_iniciar(): Response
    {
        return $this->render('partes/header.php.twig', [
           'devuelto_dos' => 'uno mas'
        ]);
    }

    
}
?>