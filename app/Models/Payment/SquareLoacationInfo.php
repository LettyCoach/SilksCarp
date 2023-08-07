<?php

namespace App\Models\Payment;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Square\SquareClient;

class SquareLoacationInfo
{
    // use HasFactory;
    var $currency;
    var $country;
    var $location_id;

    function __construct()
    {
        $access_token = env('SQUARE_ACCESS_TOKEN');

        $square_client = new SquareClient([
            'accessToken' => $access_token,
            'environment' => env('SQUARE_ENVIRONMENT')
        ]);
        
        $location = $square_client->getLocationsApi()->retrieveLocation(env('SQUARE_LOCATION_ID'))->getResult()->getLocation();
        $this->location_id = $location->getId();
        $this->currency = $location->getCurrency();
        $this->country = $location->getCountry();
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getId()
    {
        return $this->location_id;
    }
}