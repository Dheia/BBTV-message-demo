<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayHistory extends Model
{
    use HasFactory;
     protected $table = "pay_historys";
     
     protected $fillable = [
        'user_id','type', 'status', 'amount', 'period'
    ];
}
