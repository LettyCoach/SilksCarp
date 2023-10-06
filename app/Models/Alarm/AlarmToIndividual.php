<?php

namespace App\Models\Alarm;

use App\Models\User;
use Config;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlarmToIndividual extends Model
{
    use HasFactory;
    public function getTypeName()
    {
        return Config::get('app.alarmTypes_I')[$this->type];
    }

    public function getStartDate()
    {
        return Carbon::parse($this->created_at)->format("Y-m-d");
    }

    public function getEndDate()
    {
        return Carbon::parse($this->end_date)->format("Y-m-d");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
