<?php

namespace App\Controller;

use App\Entity\Bestelling;
use App\Entity\Reservering;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Bon2Controller extends AbstractController
{
    /**
     * @Route("/bon2/{id}", name="bon2")
     */
    public function index($id)
    {
        $bon = $this->getDoctrine()->getRepository(Bestelling::class)->findBy(['bon' => $id]);
        return $this->render('bon2/index.html.twig', [
            'bon' => $bon,
            'controller_name' => 'Bon2Controller',
        ]);
    }
}
