<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Models extends Model
{
    use HasFactory;   
     use SoftDeletes;
    protected $table = "models";

    protected $fillable = [
        'user_id',
        'model_name',
        'gallery_image',
        'phone',
        'video',
        'Orientation',
        'Ethnicity',
        'Language',
        'Hair',
        'Fetishes',
        'Model_Category',
        'stage_name',
        'url1',
        'url2',
        'url3',
        'cost_msg',
        'cost_pic',
        'cost_videomsg',
        'cost_audiomsg',
        'cost_audiocall',
        'cost_videocall',
        'featured',
        'trending',
        'explore',
        'socail_links',
        'deleted_at',
    ];
    protected $dates = [
       
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function modelcategory()
    {
        return $this->hasOne('App\Models\ModelCategory', 'id', 'Model_Category');
    }
    public function available_feed()
    {
        return $this->hasMany('App\Models\ModelFeed', 'Model_id', 'user_id');
    }
    public function modelfeed()
    {    $current_time = Carbon::now();
        return $this->available_feed()->where('status','=', '1')->where('schedule_date', '<=', $current_time)->orderBy('schedule_date','DESC');
    }
  
    
    public function tags()
    {
        return $this->belongsToMany(Tags::class);

    }
    public function ModelEthnicity()
    {
        return $this->hasOne('App\Models\ModelEthnicity', 'id', 'Ethnicity');
    }
    public function ModelFetishes()
    {
        return $this->hasOne('App\Models\ModelFetishes', 'id', 'Fetishes');
    }
    public function ModelHair()
    {
        return $this->hasOne('App\Models\ModelHair', 'id', 'Hair');
    }
    public function UserCategory()
    {
        return $this->hasOne('App\Models\ModelCategory', 'id', 'Model_Category');
    }
    public function UserLanguage()
    {
        return $this->hasOne('App\Models\ModelLanguage', 'id', 'Language');
    }
    public function UserOrientation()
    {
        return $this->hasOne('App\Models\ModelOrientation', 'id', 'Orientation');
    }
    public function earning()
    {
        return $this->hasOne('App\Models\user_logs', 'to', 'id');
    }
  
    
    public function documents(){
        return $this->hasMany('App\Models\User_documents', 'user_id', 'user_id');
    }
}
