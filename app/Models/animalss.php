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

}
