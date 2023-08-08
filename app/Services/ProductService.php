<?php

namespace App\Services;

use App\Repository\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }


    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function list()
    {
        return $this->repository->list();
    }
}
