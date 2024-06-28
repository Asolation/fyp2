<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestProgress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'quest_id', 'completed'];

    public function quest()
    {
        return $this->hasMany(Quest::class);
    }
}
