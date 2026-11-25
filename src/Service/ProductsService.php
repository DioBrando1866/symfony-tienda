<?php

namespace App\Service;

use App\Repository\ProductRepository;

class ProductsService
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getProducts(): array
    {
        return $this->repository->findAll();
    }
}