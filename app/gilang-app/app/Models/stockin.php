<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockin extends Model
{
    use HasFactory;
    protected $fillable = ['barang_id', 'distributor_id', 'qty_masuk', 'harga_dist', 'status'];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }

    public function distributor()
    {
        return $this->belongsTo(distributor::class);
    }
}
