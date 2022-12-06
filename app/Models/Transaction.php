<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";

    protected $fillable = [
        'user_id',
        'trans_id',
        'amount',
        'balance_transaction',
        'currency',
        'description',
        'paid',
        'payment_method',
        'status',            
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
