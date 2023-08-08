<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{
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
        return Product::all();
    }
}
