<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'test_step_id'
    ];
}
