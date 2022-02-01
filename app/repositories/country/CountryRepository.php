<?php

namespace App\repositories\country ;

use App\Models\Country;

class CountryRepository
{
    public function index()
    {
        return Country::all();
    }

    public function store($countryRequest)
    {
        Country::create($countryRequest->all());
    }

    public function update($updateCountryRequest,$city)
    {
        $city->update($updateCountryRequest->all());
    }

    public function delete($country)
    {
        $country->delete();
    }
}
