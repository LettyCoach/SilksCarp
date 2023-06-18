<?php

namespace App\Models\ProductMana;

use File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $dirPath = "assets/upload/";
    public $plusImgUrl = "assets/images/common/plus.png";
    public $blankImgUrl = "assets/images/common/transparent.png";

    public function getPlusImgUrl()
    {
        return asset($this->plusImgUrl);
    }

    public function makeFullPath($name)
    {

        $url = $this->dirPath . $name;
        if ($name == "") {
            $url = $this->blankImgUrl;
        }

        if (!File::exists($url)) {
            $url = $this->blankImgUrl;
        }

        return asset($url);
    }

    public function getImagesWithFullPath()
    {
        $images = json_decode($this->images);
        $rlts = [];
        foreach ($images as $image) {
            array_push($rlts, [
                "name" => $image->name,
                "url" => $this->makeFullPath($image->name)
            ]);
        }

        return $rlts;
    }

    public function getImageUrl($no)
    {
        return $this->getImagesWithFullPath()[$no]['url'];
    }

    public function getImageUrlFirst()
    {
        return $this->getImageUrl(0);
    }

}