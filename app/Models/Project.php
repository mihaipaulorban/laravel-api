<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Definisce le colonne che possono essere assegnate di massa
    protected $fillable = [
        'title',
        'description',
        'type_id',
    ];

    // Restituisce il tipo associato al progetto
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Restituisce le tecnologie in relazione con la tabella pivot
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
