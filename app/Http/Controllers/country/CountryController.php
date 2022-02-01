<?php

namespace App\Http\Controllers\country;

use App\Http\Controllers\Controller;
use App\Http\Requests\country\CountryRequest;
use App\Http\Requests\country\UpdateCountryRequest;
use App\Models\Country;
use App\repositories\country\CountryRepository;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    //  public function __construct()
    //  {
    //     $this->middleware('auth:api');
    //  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return resolve(CountryRepository::class)->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $countryRequest)
    {
        resolve(CountryRepository::class)->store($countryRequest);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت ساخت شد.'
        ],Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $updateCountryRequest, Country $country)
    {
        resolve(CountryRepository::class)->update($updateCountryRequest,$country);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت آپدیت شد .'
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        resolve(CountryRepository::class)->delete($country);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت حذف شد',
        ],Response::HTTP_OK);
    }
}
