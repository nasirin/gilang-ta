<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['customer', 'meja', 'kasir_id', 'status'];

    public function detail()
    {
        return $this->hasMany(tansaksiDetail::class);
    }
}
