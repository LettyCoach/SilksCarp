<?php

namespace App\Models\ProductMana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $plusImgUrl = "assets/images/common/plus.png";

    public function getPlusImgUrl()
    {
        return asset($this->plusImgUrl);
    }

}