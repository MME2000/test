<?php

use App\Http\Controllers\a;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\area\AreaController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\city\CityController;
use App\Http\Controllers\comment\CommentController;
use App\Http\Controllers\country\CountryController;
use App\Http\Controllers\item\ItemController;
use App\Http\Controllers\item\ItemStatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\region\RegionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResources([
    'items' => ItemController::class,
    'categories' => CategoryController::class,
    'regions' => RegionController::class,
    'cities' => CityController::class,
    'area' => AreaController::class,
    'comment' => CommentController::class,
    'country' => CountryController::class,
    'admin' => AdminController::class,
]);

Route::post('register',[RegisterController::class,'register']);
Route::post('login',[LoginController::class,'login']);
Route::post('logout',[LoginController::class,'logout'])->middleware('auth:api');

Route::post('itemView/{item}',[ItemStatController::class,'numView']);
Route::post('itemRepeated/{item}',[ItemStatController::class,'numRepeated']);
Route::post('itemSpam/{item}',[ItemStatController::class,'numSpam']);
Route::post('itemOffensive/{item}',[ItemStatController::class,'numOffensive']);
Route::post('itemBadClassified/{item}',[ItemStatController::class,'badClassified']);
Route::post('search',[SearchController::class,'search']);
