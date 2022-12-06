<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCalls extends Model
{
    use HasFactory;
     protected $table = "user_calls";
     
     protected $fillable = [
        'call_from','call_to', 'start_time', 'end_time', 'call_type','cost_per_min','total_earning', 'amin_commission', 'admin_earning', 'user_earning'
    ];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'call_from');
    }
    public function model()
    {
        return $this->hasOne('App\Models\User', 'id', 'call_to');
    }
    
    
}
