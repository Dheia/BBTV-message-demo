<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_logs extends Model
{
    use HasFactory;
     protected $table = "user_logs";
     
     protected $fillable = [
        'method','to', 'from', 'price', 'earnings'
    ];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'from');
    }
    public function model()
    {
        return $this->hasOne('App\Models\User', 'id', 'to');
    }
    
}
