<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route("/", name: "homepage")]
    public function index(Request $request): Response
    {
       return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'authorization' => $request->headers->get('Authorization'),
        ]);
    }
}
