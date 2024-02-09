<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animalss extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'users',
        'breed_id',
        'description',
        'date_location',
        'name_animals',
        'region'
    ];

    public function breeds_model() {
        return $this->belongsTo(breeds::class, 'breed_id', 'id');
    }

    public function users_model() {
        return $this->belongsTo(user::class, 'users','id');
    }

    public function status_model() {
        return $this->belongsTo(statusses::class, 'status','id');
    }

    
    public function foto_model() {
        return $this->hasMany(fotoanimals::class, 'id_animal','id');
    }

}
