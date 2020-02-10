<?php

namespace App\Controller;

use App\Entity\Reservering;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Bon2Controller extends AbstractController
{
    /**
     * @Route("/bon2", name="bon2")
     */
    public function index()
    {
        $bon = $this->getDoctrine()->getRepository(Reservering::class)->findby([reservering_id = bestelling.reservering_id]);
        return $this->render('bon2/index.html.twig', [
            'bon' => $bon,
            'controller_name' => 'Bon2Controller',
        ]);
    }
}
