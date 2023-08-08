<?php

namespace App\Repository;

use App\Models\SalesOpportunity;

class SalesOpportunityRepository
{
    public function find($id)
    {
        return SalesOpportunity::find($id);
    }

    public function create($data, $user)
    {
        return SalesOpportunity::create([
            'client_id' => $data['client_id'],
            'date' => $data['date'],
            'saller_id' => $user->id,
            'product_id' => $data['product_id']
        ]);
    }

    public function list()
    {
        return SalesOpportunity::all();
    }

    public function approve($id)
    {

        $salesOpportunity = $this->find($id);

        $salesOpportunity->status = 'Aprovado';

        $salesOpportunity->save();

        return $salesOpportunity;
    }

    public function refuse($id)
    {

        $salesOpportunity = $this->find($id);

        $salesOpportunity->status = 'Recusado';

        $salesOpportunity->save();

        return $salesOpportunity;
    }
}
