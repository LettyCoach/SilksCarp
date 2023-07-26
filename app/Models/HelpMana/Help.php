<?php

namespace App\Models\HelpMana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Help extends Model
{
    use HasFactory;

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(HelpCategory::class, "help_to_categories", 'help_id', 'help_category_id');
    }
}