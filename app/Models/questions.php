<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'text',
        'image',
    ];
    public function quiz()
    {
        return $this->belongsTo(quiz::class);
    }
    public function possible_answer(){
        return $this->hasMany(possible_answer::class);
    }
}
