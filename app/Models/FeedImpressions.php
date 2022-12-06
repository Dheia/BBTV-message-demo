<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedImpressions extends Model
{
    use HasFactory;

    protected $table = "feed_impressions";

    // public function user()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'user_id');
    // } 
    
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function feed()
    {
        return $this->hasOne('App\Models\ModelFeed', 'id', 'feed_id');
    }
}

