<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_answer extends Model
{
    use HasFactory;

    protected $fillable = [];
    public function possible_answer()
    {
        return $this->belongsTo(possible_answer::class);
    }
    public function question()
    {
        return $this->belongsTo(questions::class);
    }
    public function quiz()
    {
        return $this->belongsTo(quiz::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
