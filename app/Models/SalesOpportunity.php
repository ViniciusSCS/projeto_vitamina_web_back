<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOpportunity extends Model
{
    use HasFactory;

    protected $fillable = ['client', 'price', 'date', 'status', 'seller_id'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
