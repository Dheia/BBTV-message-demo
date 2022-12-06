<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChMessage extends Model
{
    //
    public function sender()
    {
        return $this->hasOne('App\Models\User', 'id', 'from_id');
    }
    public function receiver()
    {
        return $this->hasOne('App\Models\User', 'id', 'to_id');
    }
}
