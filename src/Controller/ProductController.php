<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_product')]
    public function listProducts(): Response
    {

        $title = "Liste des produits";

        return $this->render('product/index.html.twig', [
            'title' => $title,
        ]);
    }

    #[Route('product/{id}', name: 'app_product_view', methods: ['GET'])]
    public function viewProduct(Request $request, $id): Response
    {

        $id = $request->get('id');

        return $this->render('product/view.html.twig', [
            'id' => $id,
        ]);
    }
}
