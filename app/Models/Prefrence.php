<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefrence extends Model
{
    use HasFactory;

    protected $table = "user_prefrence";
    protected $fillable=['id','user_id','gender','value'];



    public $timestamps=true;



    
}

