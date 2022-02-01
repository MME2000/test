<?php

namespace App\repositories\comment;

use Carbon\Carbon;
use App\Models\ItemComment;
use Illuminate\Database\QueryException;

class CommentRepository
{
    public function index()
    {
        return ItemComment::orderBy('pk_i_id','desc')->get();
    }

    public function store($commentRequest)
    {
        $commentRequest['dt_pub_date'] = Carbon::now();
        // try{
         ItemComment::create($commentRequest->all());
        // }catch(QueryException $e){
            // abort('ثبتتتت نشد',500);
        // }
    }

    public function update($comment,$request)
    {
        try{
        return  $comment->update($request->all());
        }catch(QueryException $e){
            return false;
        }
    }

    public function delete($comment)
    {
        $comment->delete();
    }
}
