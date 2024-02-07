<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class breeds extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function animals_breed() {
        return $this->HasMany(animalss::class, 'breed_id');
    }

}
