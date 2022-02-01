<?php

namespace App\Http\Controllers\comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\comment\CommentRequest;
use App\Models\ItemComment;
use App\repositories\comment\CommentRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


use Carbon\Carbon;
use Illuminate\Database\QueryException;


class CommentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api')->only('store');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return resolve(CommentRepository::class)->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $commentRequest)
    {

        $status = resolve(CommentRepository::class)->store($commentRequest);
        // if($status == false){
        //     return response()->json([
        //         'message' => 'errorrrrrrrr server'
        //     ],500);
        // }

        return response()->json([
            'success' => true,
            'message' => 'کامنت ثبت شد',
        ],Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemComment  $itemComment
     * @return \Illuminate\Http\Response
     */
    public function update(ItemComment $comment , Request $request)
    {
        $status = resolve(CommentRepository::class)->update($comment,$request);
        if($status == false){
            return response()->json([
                'message' => 'اپدیت نشد',
            ],500);
        }
        return response()->json([
            'success' => true,
            'message' => 'کامنت آپدیت شد',
        ],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemComment  $itemComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemComment $comment)
    {
        resolve(CommentRepository::class)->delete($comment);
        return response()->json([
            'success' => true,
            'message' => 'کامنت حذف شد'
        ],Response::HTTP_OK);
    }
}
