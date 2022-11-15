<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\WebLink\Link;

class HomepageController extends AbstractController
{
    #[Route("/", name: "homepage")]
    public function index(Request $request): Response
    {
        $response = $this->sendEarlyHints([
            (new Link(href: '/style.css'))->withAttribute('as', 'stylesheet'),
            (new Link(href: '/script.js'))->withAttribute('as', 'script'),
        ]);

        // Do something slow...

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ], $response);
    }
}
