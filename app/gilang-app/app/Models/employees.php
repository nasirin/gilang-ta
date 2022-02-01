<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'akses', 'status'];
    protected $hidden = ['created_at', 'updated_at'];
}
