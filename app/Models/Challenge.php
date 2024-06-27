<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $table = 'challenges';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'difficultyLevel',
        'points',
    ];
}
