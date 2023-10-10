<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'rating_id',
        'step_section_id',
        'note_item',
        'assessment_date'
    ];
}
