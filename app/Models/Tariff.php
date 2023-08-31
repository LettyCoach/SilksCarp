<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    static public function getTariff($money)
    {
        $model = self::where('from', '<=', $money)->where('to', '>', $money)->first();
        return floor($money / 100 * $model->paid);
    }
}