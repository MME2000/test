<?php

namespace App\Http\Controllers\area;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\area\AreaRequest;
use App\repositories\area\AreaRepository;
use Symfony\Component\HttpFoundation\Response;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return resolve(AreaRepository::class)->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $areaRequest)
    {
        resolve(AreaRepository::class)->store($areaRequest);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت ساخت شد.'
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(AreaRequest $areaRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $areaRequest, Area $area)
    {
        resolve(AreaRepository::class)->update($areaRequest,$area);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت آپدیت شد .'
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        resolve(AreaRepository::class)->delete($area);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت حذف شد',
        ],Response::HTTP_OK);
    }
}
