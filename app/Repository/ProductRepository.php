<?php

namespace App\Repository;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function find($id)
    {
        return Product::find($id);
    }

    public function create($data)
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);
    }

    public function list()
    {
        return Product::select(
            '*',
            DB::raw("CONCAT('R$ ', price) as price")
        )
            ->get();
    }
}
