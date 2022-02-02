<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockin extends Model
{
    use HasFactory;
    protected $fillable = ['barangs_id', 'distributors_id', 'qty_masuk', 'harga_dist','status'];
}
