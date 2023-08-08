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

    public function edit($id)
    {
        $product = $this->repository->find($id);

        $info = ($product == NULL ?
            ['status' => false, 'message' => 'Produto não encotrado'] :
            ['status' => true, 'message' => 'Produto encontrado', "produto" => $product]
        );

        return $info;
    }

    public function update($request, $id)
    {
        $data = $request->all();

        $product = $this->repository->find($id);

        $product->update($data);

        return $product;
    }
}
