<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleepMode extends Model
{
    use HasFactory;

    protected $table = "sleep_mode";

    // public function user()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'user_id');
    // } 
    
    public function model()
    {
        return $this->hasOne('App\Models\User', 'id', 'model_id');
    }
}

