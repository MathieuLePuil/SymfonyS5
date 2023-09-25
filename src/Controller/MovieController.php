<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Event\MovieSavedEvent;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie')]
    public function index($dispatcher): Response
    {
        $dispatcher->addListener(MovieSavedEvent::class, function (MovieSavedEvent $event) {
            $entity = $event->getEntity();
            dd($entity);
        });

        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }
}
