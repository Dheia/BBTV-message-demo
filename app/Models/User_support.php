<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_support extends Model
{
    use HasFactory;
     protected $table = "user_supports";
     
     protected $fillable = [
        'id','name', 'email', 'phone', 'message',
    ];
   
    
}
