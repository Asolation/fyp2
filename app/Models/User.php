<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'points',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function leaderboard()
    {
        return $this->hasOne(Leaderboard::class);
    }

    protected static function booted()
    {
        static::saved(function ($user) {
            if ($user->isDirty('points')) { // Check if 'points' attribute was updated
                // Update or create leaderboard entry based only on user_id
                $leaderboard = $user->leaderboard()->firstOrCreate(
                    ['user_id' => $user->id], // Attributes to match
                    ['points' => 0] // Attributes to set if creating a new entry
                );

                $leaderboard->points = $user->points; // Update points
                $leaderboard->save();
            }
        });

        static::created(function ($user) {
            // Ensure a leaderboard entry is created for every new user
            $user->leaderboard()->create([
                'points' => 0, // Initialize points, adjust as necessary
            ]);
        });
    }
}
