<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOpportunity extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'date', 'status', 'saller_id', 'product_id'];

    public function cliente()
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    public function saller()
    {
        return $this->hasOne(User::class, 'id', 'saller_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
