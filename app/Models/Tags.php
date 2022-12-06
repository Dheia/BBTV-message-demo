<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tags extends Model
{
    use HasFactory;
     use Sluggable;
        protected $table = "tags";

    protected $fillable = [
        'title',
        'slug',
        'id'
    ];
    public function models()
    {
        return $this->belongsToMany(Models::class);

    }

     public function sluggable(): array

    {

        return [

            'slug' => [

                'source' => 'title'

            ]

        ];

    }

}
