<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductRequest $request)
    {
        $data = $request->all();

        $product = $this->service->create($data);

        return ['status' => true, "messages" => 'Produto cadastrado com sucesso', "produto" => $product];
    }

    public function list()
    {
        $product = $this->service->list();

        return ['status' => true, "messages" => 'Produtos encontrados', "produto" => $product];
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->service->update($request, $id);

        return ['status' => true, "messages" => 'Produto atualizado com sucesso', "produto" => $product];
    }

    public function edit($id)
    {
        $product = $this->service->edit($id);

        return $product;
    }

    public function select()
    {
        $product = $this->service->select();

        return ['status' => true, "messages" => 'Produto selecionado', "produto" => $product];
    }
}
