<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAvailability extends Model
{
    use HasFactory;

    protected $table = "model_availability";

    // public function user()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'user_id');
    // } 
    
    public function model()
    {
        return $this->hasOne('App\Models\User', 'id', 'model_id');
    }
}

