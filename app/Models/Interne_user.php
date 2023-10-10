<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interne_user extends Model
{
    use HasFactory;

    protected $fillable = [
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
