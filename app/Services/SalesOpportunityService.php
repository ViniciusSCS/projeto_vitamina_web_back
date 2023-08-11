<?php

namespace App\Services;

use App\Repository\SalesOpportunityRepository;

class SalesOpportunityService
{
    protected $repository;

    public function __construct(SalesOpportunityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($data, $user)
    {
        return $this->repository->create($data, $user);
    }

    public function list()
    {
        return $this->repository->list();
    }

    public function search($request)
    {
        return $this->repository->search($request);
    }

    public function show($id)
    {
        $salesOpportunity = $this->repository->find($id);

        $info = ($salesOpportunity == NULL ?
            ['status' => false, 'message' => 'Oportunidade de Venda não encotrada'] :
            ['status' => true, 'message' => 'Oportunidade de Venda encontrado', "oportunidade_venda" => $salesOpportunity]
        );

        return $info;
    }

    public function approve($id)
    {
        return $this->repository->approve($id);
    }

    public function refuse($id)
    {
        return $this->repository->refuse($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();

        $salesOpportunity = $this->repository->find($id);

        $salesOpportunity->update($data);

        return $salesOpportunity;
    }
}
