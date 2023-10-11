<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'id',
        'text',
        'image',
        'quiz_id',
    ];
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    public function quiz()
    {
        return $this->belongsTo(quiz::class);
    }
    public function possibleAnswer(){
        return $this->hasMany(PossibleAnswer::class);
    }
}
