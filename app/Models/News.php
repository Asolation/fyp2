<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [
        'title',
        'description',
        'image',
        'published_at',
        'slug',
    ];

    protected $dates = [
        'published_at',
    ];
}
