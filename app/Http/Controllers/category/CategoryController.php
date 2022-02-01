<?php

namespace App\Http\Controllers\category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\repositories\categories\CategoryRepository;
use App\Http\Requests\category\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return resolve(CategoryRepository::class)->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $categoryStoreRequest)
    {
        resolve(CategoryRepository::class)->store($categoryStoreRequest);
        return response()->json([
            'success' => true,
            'message' => 'عملیات با موفقیت انجام شد',
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $categoryStoreRequest, Category $category)
    {
        resolve(CategoryRepository::class)->update($categoryStoreRequest,$category);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت آپدیت شد'
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        resolve(CategoryRepository::class)->delete($category);
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت حذف شد'
        ],Response::HTTP_OK);
    }
}
