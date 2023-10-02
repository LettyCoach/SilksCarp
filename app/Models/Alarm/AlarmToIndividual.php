<?php

namespace App\Models\Alarm;

use Config;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
