<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = ['kategori_id', 'produk', 'harga', 'status', 'keterangan'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
