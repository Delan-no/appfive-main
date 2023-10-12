<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'type',
        'title',
        'description',
        'duration',
        'visibility',
        'interne_user_id',
        
    ];
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function possibleAnswer(){
        return $this->hasMany(PossibleAnswer::class);
    }

    public function question()
    {
        return $this->hasMany(questions::class);
    }
}
