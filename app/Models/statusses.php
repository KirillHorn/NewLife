<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statusses extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function status_animals() {
        return $this->HasMany(animalss::class, 'status');
    }

}
