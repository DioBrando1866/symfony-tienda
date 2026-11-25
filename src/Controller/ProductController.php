<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\ProductsService;

final class ProductController extends AbstractController
{
    private $productsService;

    public function __construct(ProductsService $productsService)
    {
        $this->productsService = $productsService;
    }

    #[Route('/product', name: 'product')]
    public function product(): Response
    {
        $products = $this->productsService->getProducts();
        return $this->render('product/product.html.twig', compact('products'));
    }
}