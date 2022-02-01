<?php

namespace App\repositories\area;

use App\Models\Area;

class AreaRepository
{
    public function index()
    {
        return Area::all();
    }

    public function store($regionRequest)
    {
        Area::create($regionRequest->all());
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
