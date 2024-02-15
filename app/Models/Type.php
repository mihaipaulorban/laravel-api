<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Questa è la classe Type che estende Model
class Type extends Model
{
    protected $fillable = ['name'];
}
