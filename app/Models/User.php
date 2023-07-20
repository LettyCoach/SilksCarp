<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Alarm\AlarmToAll;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use File;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    private $blankAvata = "assets/images/common/user.png";

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
        'password' => 'hashed',
    ];

    public function getAvatar()
    {
        $url = "assets/users/$this->id.png";
        if (File::exists($url)) {
            return asset($url);
        }

        return asset($this->blankAvata);
    }

    public function alarms(): BelongsToMany
    {
        return $this->belongsToMany(AlarmToAll::class, 'alarm_read_states', 'user_id', 'alarm_to_all_id')->withPivot('read_date');
    }
}