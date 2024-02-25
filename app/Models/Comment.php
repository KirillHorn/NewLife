<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_comment',
        'img',
        'animals_id',
        'users_id'
    ];

    public function animals() {
        return $this->belongsTo(animalss::class, 'animals_id','id');
    }
    public function user_id() {
        return $this->belongsTo(User::class,'users_id','id' );
    }
}
