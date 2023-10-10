<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'date_time_rate',
        'step_rate',
        'folder_id',
        'step_id',
        'admin_id'
    ];
}
