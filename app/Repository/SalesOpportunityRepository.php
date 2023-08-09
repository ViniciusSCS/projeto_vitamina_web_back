<?php

namespace App\Repository;

use App\Models\SalesOpportunity;
use Illuminate\Support\Facades\DB;

class SalesOpportunityRepository
{
    public function find($id)
    {
        return SalesOpportunity::with('saller')
            ->with('client')
            ->with('product')
            ->find($id);
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
        return SalesOpportunity::with('saller')
            ->with('client')
            ->with(['product' => function ($query) {
                $query->select(
                    '*',
                    DB::raw("CONCAT('R$ ', price) as price")
                );
            }])
            ->get();
    }

    public function search($request)
    {
        $query = SalesOpportunity::query();

        if ($request->has('date')) {
            $query->where('date', $request->date);
        }

        if ($request->has('saller')) {
            $query->with(['saller' => function ($query, $request) {
                $query->where('name', 'like', $request->saller);
            }]);
        }

        return $query->with('client')
            ->with(['product' => function ($query) {
                $query->select(
                    '*',
                    DB::raw("CONCAT('R$ ', price) as price")
                );
            }])
            ->with('saller')
            ->get();
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
