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
    /**
     * @Route("/bar/{id}/approve", name="acceptdrank")
     */
    public function acceptdrank($id)
    {
        $em = $this->getDoctrine()->getManager();
        $gereeddrank = $this->getDoctrine()->getRepository(Bestelling::class)->find($id);
        $gereeddrank->setGereed(true);
        $em->persist($gereeddrank);
        $em->flush();

        return $this->redirect('/bar');
    }
    /**
     * @Route("/bar/{id}/decline", name="declinedrank")
     */
    public function declinedrank($id)
    {
        $em = $this->getDoctrine()->getManager();
        $terugdrank = $this->getDoctrine()->getRepository(Bestelling::class)->find($id);
        $terugdrank->setGereed(false);
        $em->persist($terugdrank);
        $em->flush();

        return $this->redirect('/bar');
    }
}
