<?php

namespace App\Entities\Countries\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Countries\Models\Country;
use App\Entities\Countries\Resources\CountryGetResources;

class CountriesService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(array $data)
    {
        $countries = Country::get();

        return CountryGetResources::collection($countries)->toArray(request());
    }

    public function show(string $id)
    {
        $country = Country::findOrFail($id);

        return new CountryGetResources($country);
    }
}
