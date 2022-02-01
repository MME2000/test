<?php

namespace App\repositories\region;

use App\Models\Region;

class RegionRepository
{
    public function index()
    {
        return Region::all();
    }

    public function store($regionRequest)
    {
        Region::create($regionRequest->all());
    }

    public function update($regionRequest,$region)
    {
        $region->update($regionRequest->all());
    }

    public function delete($region)
    {
        $region->delete();
    }
}
