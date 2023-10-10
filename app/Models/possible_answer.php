<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class possible_answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'state',
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
