<?php

namespace App\Controller;

use App\Entity\Bestelling;
use App\Entity\Gerecht;
use App\Entity\MenuItem;
use App\Entity\Reservering;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{
    /**
     * @Route("/bar", name="bar")
     */
    public function index()
    {
        $bar = $this->getDoctrine()->getRepository(MenuItem::class)->findBy(array('subgerechtsoort' => array(3, 4)));

        return $this->render('bar/index.html.twig', [
            'bar' => $bar,
            'controller_name' => 'BarController',
        ]);
    }
}
