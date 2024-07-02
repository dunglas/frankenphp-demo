<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route("/", name: "homepage")]
    public function index(): Response
    {
       return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }

    #[Route("/download-logo", name: "download_logo")]
    public function downloadLogo(): BinaryFileResponse
    {
        $response = new BinaryFileResponse(__DIR__.'/../../private-files/frankenphp.png');
        $response->headers->set('Content-Type', 'image/png');

        return $response;
    }
}
