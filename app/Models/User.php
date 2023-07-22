<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Alarm\AlarmToAll;
use App\Models\MessageMana\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    public function getUnreadMessages()
    {
        $unreadMSGs = array();
        $isAdmin = $this->role === 'admin';
        $admin = self::where('role', 'admin')->get()[0];

        $messages = $this->messages;
        if ($admin) {
            $messages = Message::orderby('created_at', 'desc')->get();
        }

        $initTime = "2000-01-01 00:00:00";
        foreach ($messages as $msg) {
            if ($isAdmin && $msg->read_date === $initTime) {
                array_push($unreadMSGs, [
                    "avatar" => $msg->user->getAvatar(),
                    "name" => $this->name,
                    "title" => $msg->title,
                    "time" => $msg->created_at,
                    "msg_id" => $msg->id
                ]);
            }

            $messageSubs = $msg->messages;
            foreach ($messageSubs as $sMsg) {
                if ($isAdmin && $sMsg->type === 1 || !$isAdmin && $sMsg->type === 0) {
                    continue;
                }
                if ($sMsg->read_date !== $initTime)
                    continue;
                $avatar = $msg->user->getAvatar();
                if ($sMsg->type === 1)
                    $avatar = $admin->getAvatar();
                array_push($unreadMSGs, [
                    "avatar" => $avatar,
                    "name" => $this->name,
                    "title" => $sMsg->title,
                    "time" => $sMsg->created_at,
                    "msg_id" => $msg->id
                ]);
            }
        }

        return $unreadMSGs;
    }
}