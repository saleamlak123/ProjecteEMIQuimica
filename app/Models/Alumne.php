<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'user_id', 'dni', 'cognom', 'dataN'];
}
