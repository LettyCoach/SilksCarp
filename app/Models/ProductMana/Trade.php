<?php

namespace App\Models\ProductMana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Trade extends Model
{
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getTradeDate()
    {
        $date = Carbon::parse($this->trade_date);
        return $date->format("Y-m-d");
    }
}