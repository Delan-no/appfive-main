<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'uuid',
        'study_level',
        'year_graduated',
        'university',
        'graduated_name',
        'actual_situation',
        'english_level',
        'why_us',
        'your_expectations',
        'just_imagin',
        'your_futur',
        'know_us',
    ];
    
}
