<?php

namespace App\Controller;

use App\Service\SlugService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SlugController extends AbstractController
{
    private $slugService;

    public function __construct(SlugService $slugService)
    {
        $this->slugService = $slugService;
    }

    #[Route('/slug', name: 'app_slug')]
    public function index(): Response
    {
        $text = "iph&pohgéàAIHfh";
        $slug = $this->slugService->generateSlug($text);

        return $this->render('slug/index.html.twig', [
            'controller_name' => 'SlugController',
            'slug' => $slug,
        ]);
    }
}