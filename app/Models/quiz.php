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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function possible_answer()
    {
        return $this->hasMany(possible_answer::class);
    }

    public function question()
    {
        return $this->hasMany(questions::class);
    }
}
