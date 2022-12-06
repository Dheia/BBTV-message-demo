<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Send_emails extends Model
{
    use HasFactory;
    
        protected $table = "send_emails";

    protected $fillable = [
        'message',
        'emails',
        
       
    ];

    
}
