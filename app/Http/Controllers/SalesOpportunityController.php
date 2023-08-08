<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesOpportunityRequest;
use Illuminate\Http\Request;
use App\Services\SalesOpportunityService;

class SalesOpportunityController extends Controller
{
    protected $service;

    public function __construct(SalesOpportunityService $service)
    {
        $this->service = $service;
    }

    public function create(SalesOpportunityRequest $request)
    {
        $data = $request->all();
        $user = $request->user();

        $salesOpportunity = $this->service->create($data, $user);

        return ['status' => true, "messages" => 'Oportunidade de venda cadastrada com sucesso', "oportunidade_venda" => $salesOpportunity];
    }


    public function approve($id)
    {
        $salesOpportunityToApprove = $this->service->approve($id);

        return ['status' => true, "messages" => 'Oportunidade de venda aprovado com sucesso', "oportunidade_venda" => $salesOpportunityToApprove];
    }


    public function refuse($id)
    {
        $salesOpportunityToReprove = $this->service->refuse($id);

        return ['status' => true, "messages" => 'Oportunidade de venda reprovado com sucesso', "oportunidade_venda" => $salesOpportunityToReprove];
    }

    public function list()
    {
        $salesOpportunity = $this->service->list();

        return ['status' => true, "messages" => 'Oportunidades de vendas encontradas', "oportunidade_venda" => $salesOpportunity];
    }

    public function show($id)
    {
        $salesOpportunity = $this->service->show($id);

        return $salesOpportunity;
    }

    public function destroy($id)
    {
        //
    }
}
