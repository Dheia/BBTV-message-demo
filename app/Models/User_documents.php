<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_documents extends Model
{
    use HasFactory;
     protected $table = "user_documents";
     
     protected $fillable = [
        'user_id','document_type', 'document'
    ];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    
}
