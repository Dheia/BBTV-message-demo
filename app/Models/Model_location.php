<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_location extends Model

{
    use HasFactory;
    protected $table = "model_locations"; 


    protected $fillable = [
        'user_id',
        'location'
    ];

}

