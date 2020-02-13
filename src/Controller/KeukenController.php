<?php

namespace App\Controller;

use App\Entity\Bestelling;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class KeukenController extends AbstractController
{
    /**
     * @Route("/keuken", name="keuken")
     */
    public function index()
    {
        $bestelling = $this->getDoctrine()->getRepository(Bestelling::class)->findAll();
        return $this->render('keuken/index.html.twig', [
            'bestelling' => $bestelling,
            'controller_name' => 'KeukenController',
        ]);
    }
}
