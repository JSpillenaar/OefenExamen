<?php

namespace App\Controller;

use App\Entity\Bestelling;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{
    /**
     * @Route("/bar", name="bar")
     */
    public function index()
    {
//        $bar = $this->getDoctrine()->getRepository(MenuItem::class)->findBy(array('subgerechtsoort' => array(3, 4)));
         $bestelling = $this->getDoctrine()->getRepository(Bestelling::class)->findAll();


        return $this->render('bar/index.html.twig', [
            'bestelling' => $bestelling,
            'controller_name' => 'BarController',
        ]);
    }
}
