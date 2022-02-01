<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->s_search;
        $search = Item::with('category')->where('s_contact_name','like',"%{$data}%")->get();
        return $search;
    }
}
