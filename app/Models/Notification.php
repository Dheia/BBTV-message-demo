<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Notification extends Model
{
    use HasFactory;
     use Sluggable;
        protected $table = "User_notification";

    protected $fillable = [
        'user_id',
        'notification_type',
        'value',
      
    ];


     public function sluggable(): array

    {

        return [

            'slug' => [

                'source' => 'title'

            ]

        ];

    }

}
