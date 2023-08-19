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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany(Idea::class, 'votes');
    }

    /**
     * @param Idea $idea
     */
    public function vote(Idea $idea)
    {
        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $this->id
        ]);
    }

    /**
     * @return string
     */
    public static function getAvatar()
    {
        // random number between 1 and 40
        $randInt = rand(1, 40);

        // return url
        return "https://source.unsplash.com/200x200/?face&crop=face&v=" . $randInt;
    }

    public function isAdmin()
    {
        return in_array($this->email, [
            'gabriel.gressie@gmail.com'
        ]);
    }
}
