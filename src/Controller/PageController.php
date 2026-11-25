<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\TeamService;
use App\Service\ProductsService;

final class PageController extends AbstractController
{
    private $productsService;
    private $teamService;

    // Añadimos ProductsService $productsService como parámetro
    public function __construct(TeamService $teamService, ProductsService $productsService)
    {
        $this->productsService = $productsService;
        $this->teamService = $teamService;
    }
    
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $products = $this->productsService->getProducts();
        $team = $this->teamService->getTeam();
        return $this->render('page/index.html.twig', compact('team', 'products'));
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        $team = $this->teamService->getTeam();
        return $this->render('page/about.html.twig', compact('team'));
    }
    
    #[Route('/service', name: 'service')]
    public function service(): Response
    {
        return $this->render('page/service.html.twig', []);
    }
}