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

    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    public function question()
    {
        return $this->belongsTo(questions::class);
    }

    public function quiz()
    {
        return $this->belongsTo(quiz::class);
    }
}
