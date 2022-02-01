<?php

namespace App\Http\Controllers\region;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\region\RegionRequest;
use App\repositories\region\RegionRepository;
use Symfony\Component\HttpFoundation\Response;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return resolve(RegionRepository::class)->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $regionRequest)
    {
        resolve(RegionRepository::class)->store($regionRequest);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت ساخت شد.'
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $regionRequest,Region $region)
    {
        resolve(RegionRepository::class)->update($regionRequest,$region);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت آپدیت شد .'
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        resolve(RegionRepository::class)->delete($region);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت حذف شد',
        ],Response::HTTP_OK);
    }
}
