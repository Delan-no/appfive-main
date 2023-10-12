<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'possible_answer_id',
        'question_id',
    ];

    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
