<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExterneUser extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'note',
     ];
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     public function quiz()
     {
         return $this->belongsTo(quiz::class);
     }
}
