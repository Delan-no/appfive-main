<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PossibleAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'text',
        'state',
        'quiz_id',
        'question_id'
    ];

    public function question()
    {
        return $this->belongsTo(questions::class);
    }

    public function quiz()
    {
        return $this->belongsTo(quiz::class);
    }
}
