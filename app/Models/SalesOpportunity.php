<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOpportunity extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'date', 'status', 'saller_id', 'product_id'];
}
