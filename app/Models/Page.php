<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Page extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = "pages";

    protected $fillable = [
        'title',
        'content',
        'status',
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
