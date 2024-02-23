<?php

namespace App\Controller;

use App\Entity\Actor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetAllActorsController extends AbstractController
{
    public function __invoke(EntityManagerInterface $em): JsonResponse
    {
        $actors = $em->getRepository(Actor::class)->findAll();
        return $this->json($actors, 200, [], ['groups' => ['actor:read']]);
    }
}

