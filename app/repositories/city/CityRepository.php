<?php

namespace App\repositories\city;

use App\Models\City;

class CityRepository
{
    public function index()
    {
        // return City::with('itemLocations.item')->get();
        return City::all();
    }

    public function store($regionRequest)
    {
        City::create($regionRequest->all());
    }

    public function update($cityRequest,$city)
    {
        $city->update($cityRequest->all());
    }

    public function delete($city)
    {
        $city->delete();
    }
}
