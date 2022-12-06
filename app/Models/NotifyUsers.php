<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyUsers extends Model
{
    use HasFactory;

    protected $table = "notify_user";

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    } 
    
    public function model()
    {
        return $this->hasOne('App\Models\User', 'id', 'model_id');
    }
}

