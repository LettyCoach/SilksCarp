<?php

namespace App\Models\ProductMana;

use App\Models\MoneyMana\Money;
use Carbon\Carbon;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WithdrawalInfo extends Model
{
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function money(): BelongsTo
    {
        return $this->belongsTo(Money::class, 'user_id', 'user_id');
    }
    public function targetUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getTradeDate()
    {
        $date = Carbon::parse($this->trade_date);
        return $date->format("Y-m-d");
    }


}
