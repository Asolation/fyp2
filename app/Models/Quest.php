<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'description', 'points'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function userQuestProgress()
    {
        return $this->belongsTo(UserQuestProgress::class);
    }
}
