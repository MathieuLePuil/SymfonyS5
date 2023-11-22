<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    #[Route('/', name: 'app_demo')]
    public function index(): Response
    {

        $date = new \DateTime();

        return $this->render('demo/index.html.twig', [
//            'date' => $date->format('l d M Y H:i:s'),
//        'date' => '2023-09-20 14:41:00',
        ]);
    }
}
