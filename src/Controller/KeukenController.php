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
    /**
     * @Route("/keuken/{id}/approve", name="acceptgerecht")
     */
    public function acceptgerecht($id)
    {
        $em = $this->getDoctrine()->getManager();
        $gereedgerecht = $this->getDoctrine()->getRepository(Bestelling::class)->find($id);
        $gereedgerecht->setGereed(true);
        $em->persist($gereedgerecht);
        $em->flush();

        return $this->redirect('/keuken');
    }
    /**
     * @Route("/keuken/{id}/decline", name="declinegerecht")
     */
    public function declinegerecht($id)
    {
        $em = $this->getDoctrine()->getManager();
        $teruggerecht = $this->getDoctrine()->getRepository(Bestelling::class)->find($id);
        $teruggerecht->setGereed(false);
        $em->persist($teruggerecht);
        $em->flush();

        return $this->redirect('/keuken');
    }
}
