<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotoanimals extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_animal',
        'img'
    ];

    public function animals_models() {
        return $this->belongsTo(animalss::class,'id_animal','id');
    }
}
