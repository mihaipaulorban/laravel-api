<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

// Questa è la classe Type che estende Model
class Type extends Model
{
    protected $fillable = ['name'];

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->name);
    }
}
