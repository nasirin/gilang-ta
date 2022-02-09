<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tansaksiDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transaksi_id', 'produk_id', 'qty', 'keterangan', 'total'];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }
}
