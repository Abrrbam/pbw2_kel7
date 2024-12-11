<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    /** @use HasFactory<\Database\Factories\KostFactory> */
    use HasFactory;
    protected $guarded = ['id_kost'];
}
