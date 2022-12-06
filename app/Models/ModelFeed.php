<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFeed extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'model_id');
    }
    public function model(){
        return $this->hasOne('App\Models\Models', 'user_id', 'model_id');
    }
    public function feedmedia()
    {
        return $this->hasMany('App\Models\Feed_media','feed_id','id');
    }
    public function feedmediabelongs()
    {
        return $this->belongsToMany('App\Models\Feed_media','feed_id','id');
    }
    public function feedmedialikes()
    {
        return $this->hasMany('App\Models\Model_feed_likes','feed_id','id');
    }
    public function feedImpressions()
    {
        return $this->hasMany('App\Models\FeedImpressions','feed_id','id');
    }
}
