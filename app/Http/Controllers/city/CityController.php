<?php

namespace App\Http\Controllers\city;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\city\CityRequest;
use App\repositories\city\CityRepository;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return resolve(CityRepository::class)->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $cityRequest)
    {
        resolve(CityRepository::class)->store($cityRequest);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت ساخت شد.'
        ],Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $cityRequest, City $city)
    {
        resolve(CityRepository::class)->update($cityRequest,$city);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت آپدیت شد .'
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        resolve(CityRepository::class)->delete($city);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت حذف شد',
        ],Response::HTTP_OK);
    }
}
