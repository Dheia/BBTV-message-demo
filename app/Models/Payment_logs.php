<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_logs extends Model
{

    public $table = 'payment_logs';
     protected $fillable = [
        'user_id',
        'amount'
    ];

 
   
}
