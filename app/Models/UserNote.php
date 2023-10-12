<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
     ];

     protected $keyType = 'string';

     /**
      * Indicates if the IDs are auto-incrementing.
      *
      * @var bool
      */
     public $incrementing = false;

     public function user()
     {
         return $this->belongsTo(User::class);
     }
     public function quiz()
     {
         return $this->belongsTo(quiz::class);
     }
}
