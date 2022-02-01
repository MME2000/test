<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\admin\CreateAdminRequest;
use App\Http\Requests\admin\UpdateAdminRequest;
use App\repositories\admin\AdminRepository;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return resolve(AdminRepository::class)->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $createAdminRequest)
    {
        resolve(AdminRepository::class)->store($createAdminRequest);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت ساخت شد.'
        ],Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $updateAdminRequest,Admin $admin)
    {
        resolve(AdminRepository::class)->update($updateAdminRequest,$admin);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت آپدیت شد .'
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        resolve(AdminRepository::class)->delete($admin);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت حذف شد',
        ],Response::HTTP_OK);
    }
}
