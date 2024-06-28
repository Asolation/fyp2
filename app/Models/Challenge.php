<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'difficultyLevel', 'points', 'is_active'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_challenges')->withPivot('completed')->withTimestamps();
    }
}
