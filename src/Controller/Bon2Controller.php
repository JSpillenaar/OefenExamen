<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Bon2Controller extends AbstractController
{
    /**
     * @Route("/bon2", name="bon2")
     */
    public function index()
    {
        return $this->render('bon2/index.html.twig', [
            'controller_name' => 'Bon2Controller',
        ]);
    }
}
