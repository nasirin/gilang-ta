<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class audit extends Model
{
    use HasFactory;
    protected $fillable = ['barang_id', 'admin_id', 'qty', 'status', 'audit_date'];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
